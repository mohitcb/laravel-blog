<template>
    <div class="container">
    
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"></div>
                    <span>Remaining</span> {{remaining}}
                    <div v-for="todo in todos" class="panel-body">
                    <li class="todo">
                      <input type="checkbox" :checked="todo.done">
                        <label v-text="todo.body"></label>
                     </li>                    
                    </div>
                </div>
            </div>
        </div>  
    </div>
</template>

<script>
import {mapState,mapMutations,mapGetters,mapActions} from 'vuex';

    export default {
      computed: {
        ...mapState(['todos']),

        remaining:function(){
          var vm = this;
          return this.$store.state.todos.filter(function(todo){
            return ! vm.isCompleted(todo);
          }).length;
        }

       },

       methods:{
        isCompleted:function(todo){
          return todo.done;
        }
       }, 
      }
    
</script>
