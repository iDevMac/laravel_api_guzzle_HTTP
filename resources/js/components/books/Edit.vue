<template>
<template>
<div class="col-12">
    <div class="card">
        <div class="card-header"><h1>Edit Books</h1></div>
        <div class="card-body">
            <form @submit.prevent="update">
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

            <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
</template>

<script>
    export default{
        name: "update-book",
        data(){
            return{
                book:{
                    name:"",
                    isbn: "",
                    authors:"",
                    number_of_pages:"",
                    publisher:"",
                    country:"",
                    release_date:"",
                    _method:"patch"
                }
            }
        },
        mounted(){
            this.showBook()
        },
        methods:{
            async showBook(){
                await this.axios.get('/api/book/${this.$router.params.id}', this.book).then(response=>{
                    const{name,isbn,authors,number_of_pages,publisher,country,release_date} = response.data
                    this.book.name = name
                    this.book.isbn = isbn
                    this.book.authors = authors
                    this.book.number_of_pages = number_of_pages
                    this.book.publisher = publisher
                    this.book.country = country
                    this.book.release_date = release_date
                }).catch(error=>{
                    console.log(error)
                })
            },
            async update(){
                await this.axios.post('/api/book/${this.$router.params.id}', this.book).then(response=>{
                    this.$router.push({name:'bookList'})
                }).catch(error=>{
                    console.log(error)
                })
            }
        }
    }
</script>

</template>
