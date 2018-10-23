<template>
   <div class="card">
      <div class="card-header">
        <div class="row">
          <div class="col-5">
            <h3 class="card-title">Create Ideas</h3>
          </div>
        </div>
      </div>
      <div class="card-body">
          <div class="table-responsive">
            <form>
                <div class="input-group mb-3 col-3">
                  <input type="text" class="form-control" v-model="number" placeholder="Add no. of rows">
                  <span class="input-group-append">
                    <button type="button" class="btn btn-info" @click="addRow(number)">Add</button>
                  </span>
                </div>
                <table class="table table-hover">
                  <thead>
                    <tr class="d-flex">
                      <th class="col-1"><input type="checkbox" class="form-control" v-model="selectAll" @click=""></th>
                      <th class="col-2">Company</th>
                      <th class="col-2">Category</th>
                      <th class="col-2">Existing or new</th>
                      <th class="col-2">Socio-Economic Class</th>
                      <th class="col-2">Demographics</th>
                      <th class="col-2">Distribution</th>
                      <th class="col-2">Product Concept</th>
                      <th class="col-2">Product Description</th>
                      <th class="col-2">Psychographics</th>
                      <th class="col-2">Opportunities</th>
                      <th class="col-2">Suggested Retail Price</th>
                      <th class="col-2">Competition</th>
                      <th>index</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr class="d-flex" v-for="(row, index) in rows">
                      <td class="col-1">
                          <input type="checkbox" class="form-control" v-model="selectAll">
                      </td>
                      <td class="col-2">
                        <select class="form-control" id="company" v-model="row.company">
                          <option value="" selected="">Please Select</option>
                          <option :value="company.id" v-for="company in companies">
                            {{ company.name }}
                          </option>
                        </select>
                      </td>
                      <td class="col-2">
                        <select class="form-control" id="category" v-model="row.category">
                          <option value="" selected="">Please Select</option>
                          <option :value="category.id" v-for="category in categories">
                            {{ category.name }}
                          </option>
                        </select>
                      </td>
                      <td class="col-2">
                       <select class="form-control" id="existing" v-model="row.existing">
                          <option value="" selected="">Please Select</option>
                          <option value="existing">Existing</option>
                          <option value="new">New</option>
                        </select>
                      </td>
                      <td class="col-2">
                       <select class="form-control" id="sec" v-model="row.sec">
                          <option value="" selected="">Please Select</option>
                          <option :value="sec.id" v-for="sec in secs">
                            {{ sec.name }}
                          </option>
                        </select>
                      </td>
                      <td class="col-2">
                       <select class="form-control" id="demographics" v-model="row.demographic">
                          <option value="" selected="">Please Select</option>
                          <option :value="demographic.id" v-for="demographic in demographics">
                            {{ demographic.name }}
                          </option>
                        </select>
                      </td>
                      <td class="col-2">
                       <select class="form-control" id="distribution" v-model="row.distribution">
                          <option value="" selected="">Please Select</option>
                          <option :value="distribution.id" v-for="distribution in distributions">
                            {{ distribution.name }}
                          </option>
                        </select>
                      </td>
                      <td class="col-2">
                        <input type="text" class="form-control" v-model="row.product_concept">
                      </td>

                      <td class="col-2">
                        <input type="text" class="form-control" v-model="row.product_description">
                      </td>
                      <td class="col-2">
                        <input type="text" class="form-control" v-model="row.psychographics">
                      </td>
                      <td class="col-2">
                        <input type="text" class="form-control" v-model="row.opportunities">
                      </td>
                      <td class="col-2">
                        <input type="number" class="form-control" v-model="row.retail_price">
                      </td>
                      <td class="col-2">
                        <input type="text" class="form-control" v-model="row.competition">
                      </td>
                      <td>
                        <input type="hidden" :value="index + 1">
                      </td>
                    </tr>
                  </tbody>
                </table>
            </form>
          </div>

          <comment></comment>

          <div class="row mt-3 d-flex">
            <div class="col-3">
              SAVE TO EDIT LATER
            </div>
            <div class="col-9">
              <button class="btn btn-warning pull-right w-25 btn-flat" @click.prevent="submit">
                <i class="fa fa-save"></i>
                SAVE
              </button>
            </div>
          </div>

          <div class="row mt-3 d-flex">
            <div class="col-3">
              SUBMIT IDEA
            </div>
            <div class="col-9">
              <button class="btn btn-warning pull-right w-25 btn-flat">
                <i class="fa fa-send"></i>
                SUBMIT
              </button>
            </div>
          </div>

      </div>
  </div>
</template>

<script>
    
    import IdeaRow from './IdeaRow.vue';

    export default {
        components: {
          IdeaRow
        },
        computed: {
          
        },
        mounted() {

        },
        props: ['companies','categories','secs','demographics','distributions'],
        data() {
            return {
              selectedForSubmition:[],
              selectAll: false,
              number: null,
              rows: [
                {
                  check:false,
                  company:'',
                  category:'',
                  existing:'',
                  sec:'',
                  demographic:'',
                  distribution:'',
                  product_concept:'',
                  product_description:'',
                  psychographics:'',
                  opportunities:'',
                  retail_price:'',
                  competition:''
                }
              ],
            }
        },
        methods: {
            addRow(number) {

              if(number.length < 0) return

              var numRows = this.rows.length

              if (numRows >= 15) return

              for(var i=1; i <= number; i++){
               this.rows.push({
                  check:false,
                  company:'',
                  category:'',
                  existing:'',
                  sec:'',
                  demographic:'',
                  distribution:'',
                  product_concept:'',
                  product_description:'',
                  psychographics:'',
                  opportunities:'',
                  competition:''
                });
               this.number = ''
               if(++numRows >= 15) break;
              }

            },
            submit() {
              axios.post('/ideas',
              {
                rows:this.rows
              }
              ).then((response) => {
                console.log(response)
              }).catch((error) => {
                console.log('error')
              })
            },
            sellectAll() {
              this.selectAll = !this.selectAll

              // this.selectedForSubmition = [];
              // if (!this.selectAll) {
              //   for (let i in this.items) {
              //     this.selectedForSubmition.push(this.items[i].id);
              //   }
              // }
            }
        }
    }
</script>


<style scoped>
  .table td {
    padding: 0.35rem;
  }
</style>