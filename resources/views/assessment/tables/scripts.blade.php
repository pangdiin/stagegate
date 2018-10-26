<script>
  $(document).ready( function () {

      $('#scoring-table').DataTable({
              "processing": true,
              "serverSide": true,
              scrollY: '50vh',
              ajax: {
                  url: "{{ route('stages.ideas.data') }}",
                  type: 'get',
              },
              "columns": [
                   {
                    data: 'id', name: 'id'
                   },
                   {
                    data: 'owner', name: 'owner'
                   },
                   {
                    data: 'company', name: 'company'
                   },
                   {
                    data: 'category', name: 'category'
                   },
                   {
                    data: 'product_concept', name: 'product_concept'
                   },
                   {
                    data: 'product_description', name: 'product_description'
                   },
                   {
                    data: 'opportunities', name: 'opportunities'
                   },
                   {
                    data: 'competition', name: 'competition'
                   },
                   {
                    data: 'retail_price', name: 'retail_price'
                   },
                   {
                      data: 'actions', name: 'actions' ,sortable:false,
                      'render': function(data) {
                        return renderLinkActions(data);
                      }
                   },
              ],
              "aLengthMenu": [ [20, 50,100], [20, 50,100] ],
              "iDisplayLength" : 20 ,
              "responsive": true,
              "searchable": true
      });

      $('#prioritization-table').DataTable({
              "processing": true,
              "serverSide": true,
              scrollY: '50vh',
              ajax: {
                  url: "{{ route('stages.ideas.data') }}",
                  type: 'get',
              },
              "columns": [
                   {
                    data: 'id', name: 'id'
                   },
                   {
                    data: 'owner', name: 'owner'
                   },
                   {
                    data: 'company', name: 'company'
                   },
                   {
                    data: 'category', name: 'category'
                   },
                   {
                    data: 'product_concept', name: 'product_concept'
                   },
                   {
                    data: 'product_description', name: 'product_description'
                   },
                   {
                    data: 'opportunities', name: 'opportunities'
                   },
                   {
                    data: 'competition', name: 'competition'
                   },
                   {
                    data: 'retail_price', name: 'retail_price'
                   },
                   {
                      data: 'actions', name: 'actions' ,sortable:false,
                      'render': function(data) {
                        return renderLinkActions(data);
                      }
                   },
              ],
              "aLengthMenu": [ [20, 50,100], [20, 50,100] ],
              "iDisplayLength" : 20 ,
              "responsive": true,
              "searchable": true
      });

      $('#feasibility-table').DataTable({
              "processing": true,
              "serverSide": true,
              scrollY: '50vh',
              ajax: {
                  url: "{{ route('stages.ideas.data') }}",
                  type: 'get',
              },
              "columns": [
                   {
                    data: 'id', name: 'id'
                   },
                   {
                    data: 'owner', name: 'owner'
                   },
                   {
                    data: 'company', name: 'company'
                   },
                   {
                    data: 'category', name: 'category'
                   },
                   {
                    data: 'product_concept', name: 'product_concept'
                   },
                   {
                    data: 'product_description', name: 'product_description'
                   },
                   {
                    data: 'opportunities', name: 'opportunities'
                   },
                   {
                    data: 'competition', name: 'competition'
                   },
                   {
                    data: 'retail_price', name: 'retail_price'
                   },
                   {
                      data: 'actions', name: 'actions' ,sortable:false,
                      'render': function(data) {
                        return renderLinkActions(data);
                      }
                   },
              ],
              "aLengthMenu": [ [20, 50,100], [20, 50,100] ],
              "iDisplayLength" : 20 ,
              "responsive": true,
              "searchable": true
      });

      $('#development-table').DataTable({
              "processing": true,
              "serverSide": true,
              scrollY: '50vh',
              ajax: {
                  url: "{{ route('stages.ideas.data') }}",
                  type: 'get',
              },
              "columns": [
                   {
                    data: 'id', name: 'id'
                   },
                   {
                    data: 'owner', name: 'owner'
                   },
                   {
                    data: 'company', name: 'company'
                   },
                   {
                    data: 'category', name: 'category'
                   },
                   {
                    data: 'product_concept', name: 'product_concept'
                   },
                   {
                    data: 'product_description', name: 'product_description'
                   },
                   {
                    data: 'opportunities', name: 'opportunities'
                   },
                   {
                    data: 'competition', name: 'competition'
                   },
                   {
                    data: 'retail_price', name: 'retail_price'
                   },
                   {
                      data: 'actions', name: 'actions' ,sortable:false,
                      'render': function(data) {
                        return renderLinkActions(data);
                      }
                   },
              ],
              "aLengthMenu": [ [20, 50,100], [20, 50,100] ],
              "iDisplayLength" : 20 ,
              "responsive": true,
              "searchable": true
      });

      $('#testmarket-table').DataTable({
              "processing": true,
              "serverSide": true,
              scrollY: '50vh',
              ajax: {
                  url: "{{ route('stages.ideas.data') }}",
                  type: 'get',
              },
              "columns": [
                   {
                    data: 'id', name: 'id'
                   },
                   {
                    data: 'owner', name: 'owner'
                   },
                   {
                    data: 'company', name: 'company'
                   },
                   {
                    data: 'category', name: 'category'
                   },
                   {
                    data: 'product_concept', name: 'product_concept'
                   },
                   {
                    data: 'product_description', name: 'product_description'
                   },
                   {
                    data: 'opportunities', name: 'opportunities'
                   },
                   {
                    data: 'competition', name: 'competition'
                   },
                   {
                    data: 'retail_price', name: 'retail_price'
                   },
                   {
                      data: 'actions', name: 'actions' ,sortable:false,
                      'render': function(data) {
                        return renderLinkActions(data);
                      }
                   },
              ],
              "aLengthMenu": [ [20, 50,100], [20, 50,100] ],
              "iDisplayLength" : 20 ,
              "responsive": true,
              "searchable": true
      });

      $('#fulllaunch-table').DataTable({
              "processing": true,
              "serverSide": true,
              scrollY: '50vh',
              ajax: {
                  url: "{{ route('stages.ideas.data') }}",
                  type: 'get',
              },
              "columns": [
                   {
                    data: 'id', name: 'id'
                   },
                   {
                    data: 'owner', name: 'owner'
                   },
                   {
                    data: 'company', name: 'company'
                   },
                   {
                    data: 'category', name: 'category'
                   },
                   {
                    data: 'product_concept', name: 'product_concept'
                   },
                   {
                    data: 'product_description', name: 'product_description'
                   },
                   {
                    data: 'opportunities', name: 'opportunities'
                   },
                   {
                    data: 'competition', name: 'competition'
                   },
                   {
                    data: 'retail_price', name: 'retail_price'
                   },
                   {
                      data: 'actions', name: 'actions' ,sortable:false,
                      'render': function(data) {
                        return renderLinkActions(data);
                      }
                   },
              ],
              "aLengthMenu": [ [20, 50,100], [20, 50,100] ],
              "iDisplayLength" : 20 ,
              "responsive": true,
              "searchable": true
      });

  });

</script>