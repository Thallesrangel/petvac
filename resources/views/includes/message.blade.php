
@switch( session('alert') )
    @case('registrado')

        <script>
            Swal.fire({
                title: 'Sucesso',
                text: 'Registro salvo com sucesso',
                icon: 'success',
                confirmButtonText: 'Ok',
                confirmButtonColor: '#f67280',
            })
        </script>
        
        @break

    @case('editado')

    <script>
        Swal.fire({
            title: 'Sucesso',
            text: 'Registro alterado com sucesso',
            icon: 'success',
            confirmButtonText: 'Ok'
        })
    </script>
    
    @break
        
    @case('excluido')

        <script>
            Swal.fire({
                title: 'Sucesso',
                text: 'Registro excluído com sucesso',
                icon: 'success',
                confirmButtonText: 'Ok'
            })
        </script>

        @break
    
    @case('excluidos')

        <script>
            Swal.fire({
                title: 'Sucesso',
                text: 'Registros excluídos com sucesso',
                icon: 'success',
                confirmButtonText: 'Fechar'
            })
        </script>

        @break

    @case('excluido_impedido')

        <script>
            Swal.fire({
                title: 'Não Autorizado',
                text: 'Não é possível excluir o registro',
                icon: 'info',
                confirmButtonText: 'Ok'
            })
        </script>

        @break

    @case('login_incorreto')

    <script>
        Swal.fire({
            title: 'Aviso',
            text: 'E-mail ou senha incorretos',
            icon: 'warning',
            confirmButtonText: 'Ok'
        })
    </script>

    @break

    @default
        
@endswitch