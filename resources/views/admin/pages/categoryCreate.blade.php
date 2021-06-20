@extends('admin.app')

@section('pagename')

@endsection
@section('content')
    <!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">

						<!--[html-partial:include:{"file":"partials/_subheader/subheader-v1.html"}]/-->
						
<!--begin::Subheader-->
						<div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
							<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">

								<!--begin::Info-->
								<div class="d-flex align-items-center flex-wrap mr-1">

									<!--begin::Page Heading-->
									<div class="d-flex align-items-baseline flex-wrap mr-5">

										<!--begin::Page Title-->
										<h5 class="text-dark font-weight-bold my-1 mr-5">Add New Category</h5>

										<!--end::Page Title-->
									</div>

									<!--end::Page Heading-->
								</div>

								<!--end::Info-->

								<!--begin::Toolbar-->
								<div class="d-flex align-items-center">

									<!--begin::Actions-->
									<a href="{{ route('admin.category.index') }}" class="btn btn-light-primary font-weight-bolder btn-sm">View All</a>

									<!--end::Actions-->

								</div>

								<!--end::Toolbar-->
							</div>
						</div>

						<!--end::Subheader-->
						
						<!--Content area here-->
						<!--begin::Entry-->
						<div class="d-flex flex-column-fluid">
							<!--begin::Container-->
							<div class="container">
								<div class="row">
									<div class="col-lg-12">
										<!--begin::Card-->
										<div class="card card-custom gutter-b example example-compact">
											<div class="card-header">
												<h3 class="card-title">Add New Category</h3>
												
											</div>
											
											<!--begin::Form-->
											<form class="form" action="{{ route('admin.category.store') }}" method="post" enctype="multipart/form-data">
												<div class="card-body">
													<div class="row">
														<div class="col-lg-8 offset-lg-2">
															@if ($errors->any())
															    <div class="alert alert-danger">
															     	<ul>
															     		@foreach ($errors->all() as $error)
															     		 	<li>{{ $error }}</li>
															             @endforeach
															         </ul>
															     </div>
															@endif
														</div>
													</div>
													@csrf
													<div class="form-group row">
														<div class="col-lg-6 offset-lg-3">
															<label>Category Name:</label>
															<input type="text" class="form-control" placeholder="Enter category name" name="name" value="{{ old('name') }}" />
															<span class="form-text text-muted">Please enter category name</span>
														</div>
														<div class="col-lg-6 offset-lg-3">
															<label>Image:</label>
															<input type="file" class="form-control" name="image" />
															<span class="form-text text-muted">URL slug</span>
														</div>
														<div class="col-lg-6 offset-lg-3">
															<label>Description:</label>
															<textarea class="form-control" placeholder="Enter category Description" name="description">{{ old('description') }}</textarea>
															<span class="form-text text-muted">Please enter category description</span>
														</div>
													</div>
													<br>
													<hr/>
													<div class="form-group row">
														<div class="col-lg-6 offset-lg-3">
															<p class="text-center"><strong>SEO</strong></p>
														</div>
														<div class="col-lg-6 offset-lg-3">
															<label>Meta Title:</label>
															<input type="text" class="form-control" placeholder="Enter category name" name="meta_title" value="{{ old('meta_title') }}" />
															<span class="form-text text-muted">Please enter Meta title</span>
														</div>
														<div class="col-lg-6 offset-lg-3">
															<label>Meta Keywords:</label>
															<input id="kt_tagify_1" class="form-control tagify" name='meta_keywords' placeholder="Keywords" value="{{ old('meta_keywords') }}" />
															<span class="form-text text-muted">Please enter Meta Keywords</span>
														</div>

														<div class="col-lg-6 offset-lg-3">
															<label>Meta Description:</label>
															<textarea class="form-control" placeholder="Enter category Description" name="meta_description">{{ old('meta_description') }}</textarea>
															<span class="form-text text-muted">Please enter category Meta description</span>
														</div>
													</div>
													
													
													
												</div>
												<div class="card-footer">
													<div class="row">
														{{-- <div class="col-lg-5"></div> --}}
														<div class="col-lg-6 offset-lg-3">
															<button type="submit" class="btn btn-primary mr-2">Save</button>
															<button type="reset" class="btn btn-secondary">Cancel</button>
														</div>
													</div>
												</div>
												{{-- <div class="card-footer">
													<div class="row">
														<div class="col-lg-6">
															<button type="reset" class="btn btn-primary mr-2">Save</button>
															<button type="reset" class="btn btn-secondary">Cancel</button>
														</div>
														<div class="col-lg-6 text-lg-right">
															<button type="reset" class="btn btn-danger">Delete</button>
														</div>
													</div>
												</div> --}}
											</form>
											<!--end::Form-->
										</div>
										<!--end::Card-->
										<!--begin::Card-->
										
										
									</div>
								</div>
							</div>
							<!--end::Container-->
						</div>
						<!--end::Entry-->
					</div>
@endsection

@section('pageWiseJavaScript')
<!--begin::Page Vendors(used by this page)-->
		{{-- <script src="{{ asset('admin-assets/assets/js/pages/crud/forms/widgets/tagify.js') }}"></script> --}}
		<!--end::Page Vendors-->
		<!--begin::Page Scripts(used by this page)-->
		<script>
			// Class definition
var KTTagifyDemos = function() {
    // Private functions
    var demo1 = function() {
        var input = document.getElementById('kt_tagify_1'),
            // init Tagify script on the above inputs
            tagify = new Tagify(input, {
                whitelist: [],
                blacklist: [".NET", "PHP"], // <-- passed as an attribute in this demo
            })


        // "remove all tags" button event listener
        document.getElementById('kt_tagify_1_remove').addEventListener('click', tagify.removeAllTags.bind(tagify));

        // Chainable event listeners
        tagify.on('add', onAddTag)
            .on('remove', onRemoveTag)
            .on('input', onInput)
            .on('edit', onTagEdit)
            .on('invalid', onInvalidTag)
            .on('click', onTagClick)
            .on('dropdown:show', onDropdownShow)
            .on('dropdown:hide', onDropdownHide)

        // tag added callback
        function onAddTag(e) {
            console.log("onAddTag: ", e.detail);
            console.log("original input value: ", input.value)
            tagify.off('add', onAddTag) // exmaple of removing a custom Tagify event
        }

        // tag remvoed callback
        function onRemoveTag(e) {
            console.log(e.detail);
            console.log("tagify instance value:", tagify.value)
        }

        // on character(s) added/removed (user is typing/deleting)
        function onInput(e) {
            console.log(e.detail);
            console.log("onInput: ", e.detail);
        }

        function onTagEdit(e) {
            console.log("onTagEdit: ", e.detail);
        }

        // invalid tag added callback
        function onInvalidTag(e) {
            console.log("onInvalidTag: ", e.detail);
        }

        // invalid tag added callback
        function onTagClick(e) {
            console.log(e.detail);
            console.log("onTagClick: ", e.detail);
        }

        function onDropdownShow(e) {
            console.log("onDropdownShow: ", e.detail)
        }

        function onDropdownHide(e) {
            console.log("onDropdownHide: ", e.detail)
        }
    }

    // var demo1Readonly = function() {
    //     // Readonly Mode
    //     var input = document.getElementById('kt_tagify_1_1'),
    //     tagify = new Tagify(input);

    //     tagify.addTags([{value:"laravel", color:"yellow", readonly: true}]);
    // }

    // var demo2 = function() {
    //     var input = document.getElementById('kt_tagify_2');
    //     var tagify = new Tagify(input, {
    //         enforceWhitelist: true,
    //         whitelist: ["The Shawshank Redemption", "The Godfather", "The Godfather: Part II", "The Dark Knight", "12 Angry Men", "Schindler's List", "Pulp Fiction", "The Lord of the Rings: The Return of the King", "The Good, the Bad and the Ugly", "Fight Club", "The Lord of the Rings: The Fellowship of the Ring", "Star Wars: Episode V - The Empire Strikes Back", "Forrest Gump", "Inception", "The Lord of the Rings: The Two Towers", "One Flew Over the Cuckoo's Nest", "Goodfellas", "The Matrix", "Seven Samurai", "Star Wars: Episode IV - A New Hope", "City of God", "Se7en", "The Silence of the Lambs", "It's a Wonderful Life", "The Usual Suspects", "Life Is Beautiful", "LÃ©on: The Professional", "Spirited Away", "Saving Private Ryan", "La La Land", "Once Upon a Time in the West", "American History X", "Interstellar", "Casablanca", "Psycho", "City Lights", "The Green Mile", "Raiders of the Lost Ark", "The Intouchables", "Modern Times", "Rear Window", "The Pianist", "The Departed", "Terminator 2: Judgment Day", "Back to the Future", "Whiplash", "Gladiator", "Memento", "Apocalypse Now", "The Prestige", "The Lion King", "Alien", "Dr. Strangelove or: How I Learned to Stop Worrying and Love the Bomb", "Sunset Boulevard", "The Great Dictator", "Cinema Paradiso", "The Lives of Others", "Paths of Glory", "Grave of the Fireflies", "Django Unchained", "The Shining", "WALLÂ·E", "American Beauty", "The Dark Knight Rises", "Princess Mononoke", "Aliens", "Oldboy", "Once Upon a Time in America", "Citizen Kane", "Das Boot", "Witness for the Prosecution", "North by Northwest", "Vertigo", "Star Wars: Episode VI - Return of the Jedi", "Reservoir Dogs", "M", "Braveheart", "AmÃ©lie", "Requiem for a Dream", "A Clockwork Orange", "Taxi Driver", "Lawrence of Arabia", "Like Stars on Earth", "Double Indemnity", "To Kill a Mockingbird", "Eternal Sunshine of the Spotless Mind", "Toy Story 3", "Amadeus", "My Father and My Son", "Full Metal Jacket", "The Sting", "2001: A Space Odyssey", "Singin' in the Rain", "Bicycle Thieves", "Toy Story", "Dangal", "The Kid", "Inglourious Basterds", "Snatch", "Monty Python and the Holy Grail", "Hacksaw Ridge", "3 Idiots", "L.A. Confidential", "For a Few Dollars More", "Scarface", "Rashomon", "The Apartment", "The Hunt", "Good Will Hunting", "Indiana Jones and the Last Crusade", "A Separation", "Metropolis", "Yojimbo", "All About Eve", "Batman Begins", "Up", "Some Like It Hot", "The Treasure of the Sierra Madre", "Unforgiven", "Downfall", "Raging Bull", "The Third Man", "Die Hard", "Children of Heaven", "The Great Escape", "Heat", "Chinatown", "Inside Out", "Pan's Labyrinth", "Ikiru", "My Neighbor Totoro", "On the Waterfront", "Room", "Ran", "The Gold Rush", "The Secret in Their Eyes", "The Bridge on the River Kwai", "Blade Runner", "Mr. Smith Goes to Washington", "The Seventh Seal", "Howl's Moving Castle", "Lock, Stock and Two Smoking Barrels", "Judgment at Nuremberg", "Casino", "The Bandit", "Incendies", "A Beautiful Mind", "A Wednesday", "The General", "The Elephant Man", "Wild Strawberries", "Arrival", "V for Vendetta", "Warrior", "The Wolf of Wall Street", "Manchester by the Sea", "Sunrise", "The Passion of Joan of Arc", "Gran Torino", "Rang De Basanti", "Trainspotting", "Dial M for Murder", "The Big Lebowski", "The Deer Hunter", "Tokyo Story", "Gone with the Wind", "Fargo", "Finding Nemo", "The Sixth Sense", "The Thing", "Hera Pheri", "Cool Hand Luke", "Andaz Apna Apna", "Rebecca", "No Country for Old Men", "How to Train Your Dragon", "Munna Bhai M.B.B.S.", "Sholay", "Kill Bill: Vol. 1", "Into the Wild", "Mary and Max", "Gone Girl", "There Will Be Blood", "Come and See", "It Happened One Night", "Life of Brian", "Rush", "Hotel Rwanda", "Platoon", "Shutter Island", "Network", "The Wages of Fear", "Stand by Me", "Wild Tales", "In the Name of the Father", "Spotlight", "Star Wars: The Force Awakens", "The Nights of Cabiria", "The 400 Blows", "Butch Cassidy and the Sundance Kid", "Mad Max: Fury Road", "The Maltese Falcon", "12 Years a Slave", "Ben-Hur", "The Grand Budapest Hotel", "Persona", "Million Dollar Baby", "Amores Perros", "Jurassic Park", "The Princess Bride", "Hachi: A Dog's Tale", "Memories of Murder", "Stalker", "NausicaÃ¤ of the Valley of the Wind", "Drishyam", "The Truman Show", "The Grapes of Wrath", "Before Sunrise", "Touch of Evil", "Annie Hall", "The Message", "Rocky", "Gandhi", "Harry Potter and the Deathly Hallows: Part 2", "The Bourne Ultimatum", "Diabolique", "Donnie Darko", "Monsters, Inc.", "Prisoners", "8Â½", "The Terminator", "The Wizard of Oz", "Catch Me If You Can", "Groundhog Day", "Twelve Monkeys", "Zootopia", "La Haine", "Barry Lyndon", "Jaws", "The Best Years of Our Lives", "Infernal Affairs", "Udaan", "The Battle of Algiers", "Strangers on a Train", "Dog Day Afternoon", "Sin City", "Kind Hearts and Coronets", "Gangs of Wasseypur", "The Help"],
    //         callbacks: {
    //             add: console.log, // callback when adding a tag
    //             remove: console.log // callback when removing a tag
    //         }
    //     });
    // }

    // var demo3 = function() {
    //     var input = document.getElementById('kt_tagify_3');

    //     // init Tagify script on the above inputs
    //     var tagify = new Tagify(input);

    //     // add a class to Tagify's input element
    //     //tagify.DOM.input.classList.remove('tagify__input');
    //     tagify.DOM.input.classList.add('form-control');
    //     tagify.DOM.input.setAttribute('placeholder', 'enter tag...');

    //     // re-place Tagify's input element outside of the  element (tagify.DOM.scope), just before it
    //     tagify.DOM.scope.parentNode.insertBefore(tagify.DOM.input, tagify.DOM.scope);
    // }

    

    


    return {
        // public functions
        init: function() {
            demo1();
            
        }
    };
}();

jQuery(document).ready(function() {
    KTTagifyDemos.init();
});
		</script>
		<!--end::Page Scripts-->
@endsection
					
					
					
		