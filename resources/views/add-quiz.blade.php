<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Categories Page</title>
    @vite('resources/css/app.css')
</head>

<body>
    <x-navbar name={{$name}}></x-navbar>
    @if(session('category'))
    <div class=" bg-green-800 text-white pl-5">
        {{session('category')}}
    </div>
    @endif
    <div class=" bg-gray-100 flex flex-col  items-center min-h-screen  pt-5">
        <div class=" bg-white p-8 rotate-2xl shadow-lg w-full max-w-md">
            @if(! Session('quizDetails'))
            <h2 class=" text-2xl text-center text-gray-800 mb-6">Add Quiz</h2>

            <form action="/add-quiz" method="get" class=" space-y-4">

                <div>

                    <input type="text" placeholder="Enter your quiz name" name="quiz"
                        class=" w-full px-4 py-2 focus:outline-none border border-gray-300 rounded-xl">
                    @error('category')
                    <div class=" text-red-500">{{$message}}

                    </div>@enderror

                </div>
                <div class="class">
                    <select class=" w-full px-4 py-2 focus:outline-none border border-gray-300 rounded-xl"
                        name="category">
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class=" w-full bg-blue-500 rounded-xl px-4 py-2 text-white b">Add</button>
            </form>
            @else
            <span class='text-green-500 font-bold'>Quiz : {{session('quizDetails')->name}}</span>
            <h2 class=" text-2xl text-center text-gray-800 mb-6">Add MCQ's</h2>
            <form action="/" method="get" class=" space-y-4">

                <div>

                    <textarea type="text" placeholder="Enter your question" name="question"
                        class=" w-full px-4 py-2 focus:outline-none border border-gray-300 rounded-xl"></textarea>
                    @error('category')
                    <div class=" text-red-500">{{$message}}

                    </div>@enderror
                </div>
                <div> <input type="text" placeholder="Enter first option" name="quiz"
                        class=" w-full px-4 py-2 focus:outline-none border border-gray-300 rounded-xl"></div>
                <div> <input type="text" placeholder="Enter second option" name="quiz"
                        class=" w-full px-4 py-2 focus:outline-none border border-gray-300 rounded-xl"></div>
                <div> <input type="text" placeholder="Enter third option" name="quiz"
                        class=" w-full px-4 py-2 focus:outline-none border border-gray-300 rounded-xl"></div>
                <div> <input type="text" placeholder="Enter forth option" name="quiz"
                        class=" w-full px-4 py-2 focus:outline-none border border-gray-300 rounded-xl"></div>
                <div>
                    <select name="right_answar"
                        class=" w-full px-4 py-2 focus:outline-none border border-gray-300 rounded-xl">
            
                <option>Select Right Answar</option>
                <option value="" class="value">A</option>
                <option value="" class="value">B</option>
                <option value="" class="value">C</option>
                <option value="" class="value">D</option></select>    </div>  

                <button type="submit" class=" w-full bg-blue-500 rounded-xl px-4 py-2 text-white b">Add</button>
                <button type="submit" class=" w-full bg-blue-500 rounded-xl px-4 py-2 text-white b">Add & Submit</button>
        </div>


        </form>
        @endif
    </div>
    <!-- <div class="w-200">

            <h1 class="text-2xl text-blue-500">Category List</h1>
            <ul class="border border-gray-200 ">
                <li class="pl-2">
                    <ul class=" flex justify-between font-bold ">
                        <li class="w-30">S.No.</li>
                        <li class="w-70">Name</li>
                        <li class="w-70">Creator</li>
                        <li class="w-30">Deleted</li>
                    </ul>
                </li>
                @foreach($categories as $category)
                <li class=" even:bg-gray-200">
                    <ul class=" pl-2 flex justify-between">
                        <li class="w-30">{{$category->id}}</li>
                        <li class="w-70">{{$category->name}}</li>
                        <li class="w-70">{{$category->creator}}</li>
                        <li class="w-30">
                        <a href="category/delete/{{$category->id}}" class="href">
                            <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960"
                                width="20px" fill="#000000">
                                <path
                                    d="M312-144q-29.7 0-50.85-21.15Q240-186.3 240-216v-480h-48v-72h192v-48h192v48h192v72h-48v479.57Q720-186 698.85-165T648-144H312Zm336-552H312v480h336v-480ZM384-288h72v-336h-72v336Zm120 0h72v-336h-72v336ZM312-696v480-480Z" />
                            </svg>
                        </a>    
                        </li>
                    </ul>
                </li>
                @endforeach
            </ul>
        </div> -->
    </div>
</body>

</html>