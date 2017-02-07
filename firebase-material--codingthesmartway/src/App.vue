<template>
	<div id="app">
		<md-card>
			<md-card-header>
				<div class="md-title">Vue Firebase</div>
				<div class="md-subhead">Add Book</div>
			</md-card-header>

			<md-card-content>
				<form id="form" novalidate @submit.stop.prevent="addBook" autocomplete="off">
					<md-input-container>
						<md-icon class="md-warn">
							warning
							<md-tooltip>Be careful. You're almost broken!</md-tooltip>
						</md-icon>

						<label>Title</label>
						<md-input type="text" class="form-control" v-model="newBook.title"></md-input>
						<md-icon>attach_money</md-icon>
					</md-input-container>

					<md-input-container>
						<md-icon class="md-warn">
							warning
							<md-tooltip>Be careful. You're almost broken!</md-tooltip>
						</md-icon>

						<label>Author</label>
						<md-input type="text" class="form-control" v-model="newBook.author"></md-input>
						<md-icon>attach_money</md-icon>
					</md-input-container>

					<md-input-container>
						<md-icon>phone</md-icon>
						<label>URL</label>
						<md-input type="text" class="form-control" v-model="newBook.url"></md-input>
					</md-input-container>

					<md-button type="submit" class="md-raised md-primary">Add Book</md-button>
				</form>
			</md-card-content>
		</md-card>

		<md-card>
			<md-card-header>
				<div class="md-subhead">Books list</div>
			</md-card-header>

			<md-card-content>
				<md-table md-sort="titles">
					<md-table-header>
						<md-table-row>
							<md-table-head md-sort-by="titles">Title</md-table-head>
							<md-table-head md-sort-by="authors" md-tooltip="The total amount of food energy and the given serving size">
								Author
							</md-table-head>
							<md-table-head md-sort-by="actions">Delete</md-table-head>
						</md-table-row>
					</md-table-header>

					<md-table-body>
						<md-table-row v-for="book in books">
							<md-table-cell>
								<a :href="book.url" target="_blank">{{book.title}}</a>
							</md-table-cell>
							<md-table-cell>
								{{book.author}}
							</md-table-cell>
							<md-table-cell>
								<a href="javascript:" @click="removeBook(book)">
									<md-icon>delete</md-icon>
								</a>
							</md-table-cell>
						</md-table-row>
					</md-table-body>
				</md-table>
			</md-card-content>
		</md-card>
	</div>
</template>

<script>
import Firebase from 'firebase'
import 'jquery'
import toastr from 'toastr'

const config = {
    apiKey: "AIzaSyB0OYAhURV7C-_XsbnlUeuZ2sdLxlofuPU",
    authDomain: "datatable-vuejs.firebaseapp.com",
    databaseURL: "https://datatable-vuejs.firebaseio.com",
    storageBucket: "datatable-vuejs.appspot.com",
    messagingSenderId: "176840209605"
}

let app = Firebase.initializeApp(config)
let db = app.database()
let booksRef = db.ref('books')

export default {
  name: 'app',
  firebase: {
    books: booksRef
  },
  data() {
		return {
			newBook: {
				title: '',
				author: '',
				url: ''
			}
		}
  },
  methods: {
  	addBook: function(){
  		booksRef.push(this.newBook)
  		this.newBook.title = ''
  		this.newBook.author = ''
  		this.newBook.url = ''
  		toastr.success("Book added with success")
  	},
  	removeBook: function(book){
  		booksRef.child(book['.key']).remove()
  		toastr.error("Book removed")
  	}
  }
}
</script>

<style>
	#app{
		padding: 20px;
	}
	.md-card{
		margin: 20px auto;
	}
</style>
