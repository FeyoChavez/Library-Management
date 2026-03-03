           </div>
        </div>
 

     <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>

     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Incluir Select2 JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            // Inicializar Select2 con AJAX
            $('#book_id').select2({
                placeholder: 'Buscar libro:',
                allowClear: true,
                minimumInputLength: 1,
                ajax: {
                    url: 'index.php?type=books&action=buscar',
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            term: params.term // Termino de búsqueda
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    id: item.id,
                                    text: item.title
                                };
                            })
                        };
                    },
                    cache: true
                },
                language: {
                    inputTooShort: function() {
                        return 'Por favor ingrese 1 o más caracteres para buscar';
                    }
                }
            });
        });
    </script>
    
     
    </body>
</html>