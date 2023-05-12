<template>
	<main>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container-fluid">
			<router-link to="/" class="nav-brand" href="#">Harde</router-link>
			<div>
				<router-link exact-active-class="active" to="/" href="#" class="nav-item nav-link">Home</router-link>
				<router-link exact-active-class="active" to="/books" href="#" class="nav-item nav-link">Books</router-link>
			</div>
		</div>
		</nav>
	</main>

<div class="container mt-5">
    <router-view></router-view>
</div>

</template>

<script>
	export default {}
</script>
