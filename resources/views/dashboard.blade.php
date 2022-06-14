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