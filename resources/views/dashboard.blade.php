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
                    You're logged in!



                <script>
                query samplePokeAPIquery {
                gen3_species: pokemon_v2_pokemonspecies(where: {pokemon_v2_generation: {name: {_eq: "generation-iii"}}}, order_by: {id: asc}) {
                    name
                    id
                }
                generations: pokemon_v2_generation {
                    name
                    pokemon_species: pokemon_v2_pokemonspecies_aggregate {
                    aggregate {
                        count
                    }
                    }
                }
                }
                </script>






                </div>
            </div>
        </div>
    </div>
</x-app-layout>
