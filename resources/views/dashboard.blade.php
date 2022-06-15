<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="panel">
                        <div class="body">
                            <div class="input-group">
                                <label for="searchBox">Buscar</label>
                                <input type="search" id="searchBox" placeholder="Buscar...">
                            </div>
                        </div>
                    </div>
                    






                    
                    <table class="myTable table hover">
                        <tbody>

                            @foreach($pokemon as $respo)
                            <tr>
                                <td >
                                    <?php $id = explode("/", $respo['url']); ?>
                                    <img src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/{{$id[6]}}.png" viewBox="0 0 24 24" class="w-96 h-96 text-gray-500" />
                                       
                                </td>
                                <td>
                                    {{$respo['name']}}
                                    <?php
                                        $totalvotos=0;
                                        $voteok=true;
                                        foreach ($votes as $vot) {
                                            if($vot->pokemon == $id[6]){
                                                $totalvotos++;
                                                if($vot->user == Auth::user()->id AND  $vot->vote == 1){ //si el usuario ya voto
                                                    $voteok=false;
                                                }   
                                            }                            
                                        }
                                        if($voteok){
                                    ?>
                                    <form action="{{route('poke.index')}}" method="post">
                                        @csrf
                                        <p>
                                            <input type="hidden" name="pokemon" value="{{$id[6]}}">
                                            <input type="hidden" name="user" value="{{ Auth::user()->id }}">
                                            <button type="submit" name="Submit">
                                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="ml-4 -mt-px w-10 h-10 text-gray-400">
                                                <path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                            </svg>
                                            </button>
                                            <span>{{$totalvotos}}</span>
                                        </p> 
                                    </form>
                                    <?php }else{?>
                                        <p>
                                            <svg fill="none" stroke="red" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="ml-4 -mt-px w-10 h-10 text-gray-400">
                                            <path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                            </svg>
                                            <span>{{$totalvotos}}</span>
                                        </p>
                                    <?php } ?>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script>

    let options = {
        numberPerPage:10, //Cantidad de datos por pagina
        goBar:true, //Barra donde puedes digitar el numero de la pagina al que quiere ir
        pageCounter:true, //Contador de paginas, en cual estas, de cuantas paginas
    };

    let filterOptions = {
        el:'#searchBox' //Caja de texto para filtrar, puede ser una clase o un ID
    };

    paginate.init('.myTable',options,filterOptions);
</script>