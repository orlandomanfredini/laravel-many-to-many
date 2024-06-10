@extends('layouts.app')

<style>
main{
    
    background-color:rgb(41, 46, 54) ;
}

.card_projects{
    background-image: url('https://t4.ftcdn.net/jpg/02/18/89/83/360_F_218898398_wnLuoR9GY4qhLB2tc7o3tSJbQCRfq0xc.jpg');
}

.card_new_project{
    background-image: url('https://c8.alamy.com/comp/PF3PEX/desktop-source-code-and-technology-background-developer-or-programer-with-coding-and-programming-wallpaper-by-computer-language-and-source-code-com-PF3PEX.jpg');

}

.card_new_type{
    background-image: url('https://t4.ftcdn.net/jpg/05/54/47/79/360_F_554477926_yKEcMeDTD1oLqKQCjvpryeT5zHLMunNh.jpg');

}
.card_tecnologies{
    background-image: url('https://media.istockphoto.com/id/914850254/vector/abstract-background-with-binary-code-analysis-and-data-transfer.jpg?s=612x612&w=0&k=20&c=EzLj5Amdjo1U_ioNoKU6d8Kc-wfOpZmK7w4O0aapVx8=');
    background-position: center;

}
</style>

@section('content')
<main class="p-3 mt-2">

    <h3 class="text-center text-white mt-5">Orlando's GitHub Random</h3>
    <p class="text-center text-white mb-5 container-sm">Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia eos,
        animi minus error deleniti maxime quibusdam est, corrupti, voluptatibus nam odio nemo fuga fugit blanditiis! Sit
        voluptas tempora quod quasi.</p>

    <div class="container">
        <div class="row g-2">
            <div class="col-12">
                <div class="card_projects card d-flex align-items-center justify-content-center p-5">
                    <h2 class="text-white mt-3">PROJECTS</h2>
                    <a class="text-white" href="{{route('admin.projects.index')}}">View</a>
                </div>
            </div>
            <div class="col-6">
                <div class="card card_new_project d-flex align-items-center justify-content-center p-5">
                    <h2 class="text-white mt-3">ADD RECORD</h2>
                    <a class="text-white" href="{{route('admin.projects.create')}}">Add</a>
                </div>
            </div>
            <div class="col-6">
                <div class="card card_new_type d-flex align-items-center justify-content-center p-5">
                    <h2 class="text-white mt-3">ADD TYPE</h2>
                    <a class="text-white" href="{{route('admin.types.create')}}">Add Type</a>
                </div>
            </div>
            <div class="col-12">
                <div class="card_tecnologies card d-flex align-items-center justify-content-center p-5">
                    <h2 class="text-white mt-3">TECNOLOGYS</h2>
                    <a class="text-white" href="{{route('admin.tecnologies.index')}}">View</a>
                </div>
            </div>
        </div>
        <div class="text-center text-white mt-5">
            <p>Rimani aggiornato iscrivendoti alla newsletter!!</p>
            <strong>© created by Orlando/Development/2024/laravel</strong>

        </div>
    </div>

</main>
@endsection