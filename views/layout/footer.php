
        <footer>
            
                <div class="row footer1" >
                    <div class="col-md-4">
                    <strong><u>Info sobre Activarjonilla</u></strong>
                    <p style="color: white; text-align: left">Guía de comercio, negocios, empresas y servicios públicos de Arjonilla.
                    <a href="<?=base_url?>home/about" style="color: yellowgreen">¿Quiénes somos?</a><br>
                    </p>
                    </div>
                    <div class="col-md-3" >
                    <strong><u>Preguntas frecuentes</u></strong><br>
                    <a href="mailto:ayuntamiento@ayuntamientodearjonilla.es" style="color: white">Contacto Ayuntamiento</a><br>
                    
                    <a href="<?=base_url?>home/avisolegal" style="color: white">Aviso Legal</a><br>
                    <a href="<?=base_url?>home/infocookies" style="color: white">Politica de Cookies</a><br>
                  </div>
                    <div class="col-md-4" >
                    <strong><u>¿Quieres entrar?</u></strong><br>
                    <?php if(!isset($_SESSION['identity'])): ?>
                        <a href="<?=base_url?>usuario/entrar" class="btn btn-primary">Entrar</a>
                        <a href="https://docs.google.com/forms/d/e/1FAIpQLSfS90Lj3nLv9jZT3ThiH6s1AzW4S3u8JRX0mqxCbUoHRc5tRg/viewform" class="btn btn-success">Regístrate</a>

                    <?php else: ; ?>
                        <a href="<?=base_url?>usuario/cpanel" class="btn btn-primary">Panel usuario</a>
                    <?php endif; ?>
                        
                    </div>
                </div>
                <div class="row footer2">
                    <div class="col-md-12" style="padding-bottom:10px;">
                     Activ@rjonilla - Copyright <?php setlocale(LC_ALL,"es_ES");echo date("Y");?> ©
                    </div>
                </div>
                    
        </footer>
 
        
        <!-- DATEPICKER --> 
        
        <script>
        $(function () {
        $(".datepicker").datepicker(
            {
        closeText: 'Cerrar',
        prevText: '< Ant',
        nextText: 'Sig >',
        currentText: 'Hoy',
        monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
        dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
        dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
        dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
        weekHeader: 'Sm',
        dateFormat: 'yy-mm-dd',
        firstDay: 1,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: ''
        }
        );
        });
        </script>

       
        <script src='<?=base_url?>assets/js/scroll.js' > </script>
        
      
        <!-- Bootstrap Js CDN -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <!-- jQuery Custom Scroller CDN -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
        <!-- Menú desplegable -->
        <script type="text/javascript">
            $(document).ready(function () {
                $("#sidebar").mCustomScrollbar({
                    theme: "minimal"
                });

                $('#dismiss, .overlay').on('click', function () {
                    $('#sidebar').removeClass('active');
                    $('.overlay').removeClass('active');
                    $('.overlay').fadeOut();
                });

                $('#sidebarCollapse').on('click', function () {
                    $('#sidebar').addClass('active');
                    $('.overlay').addClass('active');
                    $('.overlay').fadeIn();
                    $('.collapse.in').toggleClass('in');
                    $('a[aria-expanded=true]').attr('aria-expanded', 'false');
                });

              

                

            });
        </script>

      
    </body>
</html>
