<template>
    <div class="col-md-12">
            <table id="post-table" class="table">
                <thead>
                    <th>#</th>
                    <th>Cover Image</th>
                    <th></th>
                    <th>Title</th>
                    <th>Body</th>
                    <th>Created At</th>
                    <th></th>
                </thead>

                <tbody>
                        <tr v-for="post in posts" >
                            <td>{{ post.id }}</td>
                            <td>{{ post.body }}</td>
                            <td>{{ post.title }}</td>
                            </td>
                        </tr>
                </tbody>
            </table>

            <div class="text-center">
            </div>
        </div>
</template>


<script>
import {GET_POST} from './resources';
 
export default {
    name: 'post-list',
    data () {
        return {
            loading: true,
            posts:[],
        }
    },
    created() {
        loading: true,
        GET_POST((data) => {
            // console.log(data.results.data[0].id);
            this.posts = data.results.data;
        }, (err) =>{
            
        });
    },
}

</script>