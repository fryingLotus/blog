@props(['type' => 'submit'])


<button
    class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5  dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900 mt-5 mb-5"
    type="{{$type}}">{{$slot}}</button>
