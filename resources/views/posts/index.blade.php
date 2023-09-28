<x-app-layout>

    <div class="container mx-auto py-8">
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
