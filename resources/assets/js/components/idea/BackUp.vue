<template>
	<div class="">
		<td class="col-1">
		     <input type="text" class="form-control" value="index">
		</td>
		<td class="col-1">
		     <input type="checkbox" class="form-control" v-model="row.check">
		</td>
		<td class="col-2">
		  <select class="form-control" id="company" v-model="row.company">
		    <option value="ps" selected="">Please Select</option>
		    <option :value="company.id" v-for="company in companies">
		      {{ company.name }}
		    </option>
		  </select>
		</td>
		<td class="col-2">
		  <select class="form-control" id="category" v-model="row.category">
		    <option value="ps" selected="">Please Select</option>
		    <option :value="category.id" v-for="category in categories">
		      {{ category.name }}
		    </option>
		  </select>
		</td>
		<td class="col-2">
		 <select class="form-control" id="existing" v-model="row.existing">
		    <option value="ps" selected="">Please Select</option>
		    <option value="existing">Existing</option>
		    <option value="new">New</option>
		  </select>
		</td>
		<td class="col-2">
		 <select class="form-control" id="sec" v-model="row.sec">
		    <option value="ps" selected="">Please Select</option>
		    <option :value="sec.id" v-for="sec in secs">
		      {{ sec.name }}
		    </option>
		  </select>
		</td>
		<td class="col-2">
		 <select class="form-control" id="demographics" v-model="row.demographic">
		    <option value="ps" selected="">Please Select</option>
		    <option :value="demographic.id" v-for="demographic in demographics">
		      {{ demographic.name }}
		    </option>
		  </select>
		</td>
		<td class="col-2">
		 <select class="form-control" id="distribution" v-model="row.distribution">
		    <option value="ps" selected="">Please Select</option>
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
		  <input type="text" class="form-control" v-model="row.psychographics">
		</td>
		<td class="col-2">
		  <input type="number" class="form-control" v-model="row.opportunities">
		</td>
		<td class="col-2">
		  <input type="text" class="form-control" v-model="row.competition">
		</td>
	</div>
</template>

<script>
	export default {
		data() {
			return {

			}
		},
		props: ['index','row', 'companies', 'categories', 'secs', 'demographics', 'distributions']
	}
</script>

<style scoped>
	
</style>