<x-app-layout>

    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 ">
        @livewire('posts-index')
    </div>
    {{-- <script>
          var cursos = [
                'Curso de Laravel',
                'Curso de Vue',
                'Curso de PHP',
                'Curso de JavaScript',
            ];

            $('#search').autocomplete({
                source: function(request, response) {
                    $.ajax({
                        url: '{{ route('search.posts') }}',
                        dataType: "json",
                        data: {
                            term: request.term
                        },
                        success: function(data) {
                            response(data);
                        }
                    });
                },

                 select: function(event, ui) {
                    $('#search').val(ui.item.value);
                    
                    //$('#form-search').submit();
                } 
        }); 
    </script> --}}
</x-app-layout>
