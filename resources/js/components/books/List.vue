<template>
    <div class="row">
        <div class="col-12 text-end">
            <router-link :to='{name:"booksAdd"}' class="btn btn-primary">Create</router-link>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header"><h1>Books</h1></div>
                <div class="card-body">
                    <div class="table table-responsive">
                        <table class="table table-bordered">
                          <thead>
                            <tr>
                                <th>Name</th>
                                <th>Name</th>
                                <th>Isbn</th>
                                <th>Authors</th>
                                <th>Number of Pages</th>
                                <th>Publisher</th>
                                <th>Country</th>
                                <th>Release Date</th>
                                <th>Actions</th>
                            </tr>
                          </thead>
                          <tbody v-if="books.length>0">
                              <tr v-for="(book,key) in books" :key="key">
                                    <td>{{ book.id }}</td>
                                    <td>{{ book.name }}</td>
                                    <td>{{ book.isbn }}</td>
                                    <td>{{ book.authors }}</td>
                                    <td>{{ book.number_of_pages }}</td>
                                    <td>{{ book.publisher }}</td>
                                    <td>{{ book.country }}</td>
                                    <td>{{ book.release_date }}</td>
                                    <td>
                                        <router-link :to="{name:'bookEdit',params:{id:book.id}}" class="btn btn-success"></router-link>
                                        <button type="button" @click="deleteBook(book.id)" class="btn btn-dandger"><i class=""></i>Delete</button>
                                    </td>
                              </tr>
                          </tbody>
                          <tbody v-else>
                              <td colspan="4" align="center">No Book record is found</td>
                          </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name:'books',
        data(){
            return {
                books:[]
                }
        },
        mounted(){
            this.getBooks()
        },
        methods:{
            async getBooks(){
                await this.axios.get('api/book').then(response=>{
                    this.books = response.data
                }).catch(error=>{
                    console.log(error)
                    books=[]
                })
            },

            deleteBook(id){
                if (confirm("You sure want to delete this Book?")) {
                    this.axios.delete('api/books/{id}').then(response=>{
                        this.deleteBook()
                    }).catch(error=>{
                        console.log(error)
                    })
                }
            }
        }
    }
</script>
