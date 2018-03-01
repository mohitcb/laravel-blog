<template>
    <div class="container">
    
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Example Component</div>
                    Root: {{ sqrt }}
                    <div class="panel-body">
                        {{ count }} 
                    </div>

                    <button @click="increment">+1</button>
                </div>
                <todos></todos>
            </div>
        </div>  
    </div>
</template>

<script>
import {mapState,mapMutations,mapGetters,mapActions} from 'vuex';
import Todos from './Todos';
    export default {
      computed: {
        ...mapState(['count']),
        ...mapGetters(['sqrt']),
       }, 
      component:{
        Todos,
      },
      methods:{
            increment(){
                 // this.$store.commit('increment');
                 this.$store.dispatch('increment');
            }
        }
      }
    
</script>
