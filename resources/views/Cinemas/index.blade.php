 
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div id='app'>
	Select Cinema:
	<select name="" id="" v-on:change='fetchMovies()' v-model='selected_cinema'>
		@foreach($cinemas as $cinema)
		<option value="{{ $cinema->id }}">{{ $cinema->name }}</option>
		@endforeach
	</select>
	Select Movies:
	<select name="" id="">
		<option value=""></option>
	</select>
</div>
</body>


<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="/axios.min.js"></script>
<script>
	var vm = new Vue ({
		el: '#app',
		data: {
			selected_cinema: ''
		},
		methods: {
			fetchMovies(){
				axios.get('/movies?cinema_id='+this.selected_cinema).then(({data}) => {
					console.log(data);
				});
			}
		},
		mounted(){
			axios.get('/movies').then(({data}) =>{
				console.log(data)
			});

		}
	})

</script>

</html>