<template>
  <div>
  <input type="text" placeholder="search of job" v-model="query" v-on:keyup="autoComplete()" class="form-control form-control-block search-input">
  <div class="panel-footer" v-if="jobs.length">
   <ul class="list-group">
    <li class="list-group-item" v-for="job in jobs">
       <a :href=" '/job-single/'+job.id " > {{job.title}} </a>
    </li>
   </ul>
  </div>
 </div>
</template>

<script>
 export default{
  data(){
   return {
    query: '',
    jobs: [],
   }
  },
  methods: {
   autoComplete(){
    this.jobs = [];
    if(this.query.length > 2){
     axios.get('/api/search',{params: {query: this.query}}).then(response => {
      this.jobs = response.data;
     });
    }
   }
  }
 }
</script>
