<template>
	<div class="row">
		<td class="col-1">
		     <input type="text" class="form-control" :value="index + 1">
		</td>
		<td class="col-1">
		     <input type="checkbox" class="form-control">
		</td>
		<td class="col-2">
		  <select class="form-control" id="company">
		    <option value="ps" selected="">Please Select</option>
		    <option :value="company.id" v-for="company in companies">
		      {{ company.name }}
		    </option>
		  </select>
		</td>
		<td class="col-2">
		  <select class="form-control" id="category" >
		    <option value="ps" selected="">Please Select</option>
		    <option :value="category.id" v-for="category in categories">
		      {{ category.name }}
		    </option>
		  </select>
		</td>
		<td class="col-2">
		 <select class="form-control" id="existing">
		    <option value="ps" selected="">Please Select</option>
		    <option value="existing">Existing</option>
		    <option value="new">New</option>
		  </select>
		</td>
		<td class="col-2">
		 <select class="form-control" id="sec">
		    <option value="ps" selected="">Please Select</option>
		    <option :value="sec.id" v-for="sec in secs">
		      {{ sec.name }}
		    </option>
		  </select>
		</td>
		<td class="col-2">
		 <select class="form-control" id="demographics">
		    <option value="ps" selected="">Please Select</option>
		    <option :value="demographic.id" v-for="demographic in demographics">
		      {{ demographic.name }}
		    </option>
		  </select>
		</td>
		<td class="col-2">
		 <select class="form-control" id="distribution">
		    <option value="ps" selected="">Please Select</option>
		    <option :value="distribution.id" v-for="distribution in distributions">
		      {{ distribution.name }}
		    </option>
		  </select>
		</td>
		<td class="col-2">
		  <input type="text" class="form-control">
		</td>

		<td class="col-2">
		  <input type="text" class="form-control">
		</td>
		<td class="col-2">
		  <input type="text" class="form-control">
		</td>
		<td class="col-2">
		  <input type="text" class="form-control">
		</td>
		<td class="col-2">
		  <input type="number" class="form-control">
		</td>
		<td class="col-2">
		  <input type="text" class="form-control">
		</td>
	</div>
</template>

<script>
	export default {
		data() {
			return {

			}
		},
		props: ['index', 'companies', 'categories', 'secs', 'demographics', 'distributions']
	}
</script>

<style scoped>
	
</style>