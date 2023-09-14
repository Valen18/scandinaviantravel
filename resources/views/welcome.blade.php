@extends('layouts.app')

@section('content')

    <div class="relative min-h-screen justify-center bg-gray-100 bg-center sm:flex bg-dots dark:bg-gray-900 selection:bg-indigo-500 selection:text-white">
        <main class="p-4">
            <h2 class="text-center text-2xl mt-5 mb-5 py-5">Esta es la prueba técnica para la posición de FullStack en Scandinavian Travels por Valentín Ayesa</h2>
            <div class="container grid grid-cols-1 sm:grid-cols-3 gap-8">
                <div class="px-10 py-10 border-solid border-2 rounded-xl">
                    <a class="flex items-center justify-center" href="https://www.linkedin.com/in/valentinayesa/" target="_blank">
                        <img class="mr-5" src="https://cdn-icons-png.flaticon.com/256/174/174857.png" alt="Valentín Ayesa LinkedIn" width="50" />
                        Mi LinkedIn
                    </a>
                </div>
                <div class="px-10 py-10 border-solid border-2 rounded-xl flex items-center justify-center">
                    <a class="flex items-center justify-center" href="https://docs.google.com/document/d/1CPGQmW7MDMOxyCEXEEz7XPY4mV6jq0I-/edit?usp=sharing&ouid=117205449965937131346&rtpof=true&sd=true" target="_blank">
                        <img class="mr-5" src="https://cdn-icons-png.flaticon.com/512/8024/8024040.png" alt="Curriculum" width="50" />
                        Mi Curriculum
                    </a>
                </div>
                <div class="px-10 py-10 border-solid border-2 rounded-xl flex items-center justify-center">
                    <a class="flex items-center justify-center" href="https://vayesa.com" target="_blank">
                        <img class="mr-5" src="https://cdn-icons-png.flaticon.com/512/3059/3059997.png" alt="Valentín Ayesa LinkedIn" width="50" />
                        Mi Web Personal
                    </a>
                </div>
            </div>
        </main>
    </div>


@endsection
