<template>
<div class="col-12">
    <div class="card">
        <div class="card-header"><h1>Add Books</h1></div>
        <div class="card-body">
            <form @submit.prevent="create">
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control" v-model="book.name">
            </div>
            <div class="form-group">
                <label for="">ISBN</label>
                <input type="text" class="form-control" v-model="book.isbn">
            </div>
            <div class="form-group">
                <label for="">Authors</label>
                <input type="text" class="form-control" v-model="book.authors">
            </div>
            <div class="form-group">
                <label for="">Number Of Pages</label>
                <input type="text" class="form-control" v-model="book.number_of_pages">
            </div>
            <div class="form-group">
                <label for="">Country</label>
                <input type="text" class="form-control" v-model="book.country">
            </div>
            <div class="form-group">
                <label for="">Release Date</label>
                <input type="text" class="form-control" v-model="book.release_date">
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>
</template>

<script>
    export default{
        name: "add-book",
        data(){
            return{
                book:{
                    name:"",
                    isbn: "",
                    authors:"",
                    number_of_pages:"",
                    publisher:"",
                    country:"",
                    release_date:""
                }
            }
        },
        methods:{
            async create(){
                await this.axios.post('/api/book', this.book).then(response=>{
                    this.$router.push({name:"bookList"})
                }).catch(error=>{
                    console.log(error)
                })
            }
        }
    }
</script>
