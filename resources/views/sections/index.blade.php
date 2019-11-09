<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div id='app'>
	Select Sections:
	<select name="" id="" v-on:change='fetchStudents()' v-model='selected_section'>
		@foreach($sections as $section)
		<option value="{{ $section->id }}">{{ $section->name }}</option>
		@endforeach
	</select>
	Select Students:
	<select name="" id="">
		<option value=""></option>
	</select>

	<p>Without Multiple Choice</p>
        <ul>
            {{-- loop through the filtered questions --}}
            <li v-for='student in unpaidStudents'>
                @{{ student.body }}
            </li>
        </ul>
        <p>With Multiple Choice</p>
        <ul>
            {{-- loop through the filtered questions --}}
            <li v-for='student in paidStudents'>
                @{{ student.body }}
            </li>
        </ul>
</div>
</body>


<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
	var vm = new Vue ({
		el: '#app',
		data: {
			selected_section: '',
			students: []
		},
		methods: {
			fetchStudents(){
				axios.get('/students?section_id='+this.selected_section).then(function(response) {
					console.log(response.data);
					vm.students = response.data;
				});
			}
		},
		computed: {
			paidStudents() {
                    //return filtered questions
                    return this.students.filter(function(student) {
                        //return only the questions wherein the is_multiple_choice is equal to 1
                        return student.is_multiple_choice == 1;
                    });
                },
                unpaidStudents() {
                //return filtered questions
                return this.students.filter(function(student) {
                //return only the questions wherein the is_multiple_choice is equal to 0
                return student.is_multiple_choice == 0;
            });
            }
        }
		
	})
</script>
</html>