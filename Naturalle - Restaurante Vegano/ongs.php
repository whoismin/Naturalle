<?php
include('header.php');
include('config.php');
// Consulta os dados da tabela
$sql = 'SELECT nome, observacoes FROM cadastroong';
$stmt = $conn->prepare($sql);
$stmt->execute();

// Recupera todos os dados
$ongs = $stmt->fetchAll();
?>

<section class="section testi text-center has-bg-image"
    style="background-image: url('./assets/images/Salada3.png')" aria-label="testimonials">
    <div class="container">

        <div class="quote"></div>

        <p class="headline-2 testi-text">

        </p>

        <div class="wrapper">
            <div class="separator"></div>
            <div class="separator"></div>
            <div class="separator"></div>
        </div>



    </div>
</section>




<br>
<h2 class="headline-1 text-center">ONGS Cadastradas no Projeto</h2>
<div class="container2">



    <div class="card">
        <div class="img">
            <p>Mundo Sem Fome</p>
        </div>

        <div class="content">
            <p>A ONG "Mundo Sem Fome" tem como missão combater a fome e insegurança alimentar. Seu propósito é fornecer alimentos, educação nutricional e apoio a comunidades carentes, visando eliminar a fome e garantir que todas as pessoas tenham acesso a alimentos nutritivos. Eles impactam a vida de milhões de pessoas, combatendo a fome de maneira direta e eficaz.</p>
            <div class="marmitas-doadas">
                <div class="circle">80%</div>
                MARMITAS DOADAS
            </div>
        </div>
    </div>

    <div class="card">
        <div class="img">
            <p>Crianças Felizes</p>
        </div>

        <div class="content">
            <p>A ONG "Crianças Felizes" visa assegurar um futuro promissor para crianças em situações vulneráveis. Seu compromisso é oferecer acesso a educação de qualidade, cuidados de saúde e um ambiente seguro e afetuoso, com o propósito de possibilitar a todas as crianças a oportunidade de crescer, aprender e prosperar, independentemente de suas circunstâncias.</p>
            <div class="marmitas-doadas">
                <div class="circle">90%</div>
                MARMITAS DOADAS
            </div>
        </div>
    </div>

    <div class="card">
        <div class="img">
            <p>Amor e Cura</p>
        </div>

        <div class="content">
            <p>A ONG "Amor e Cura" se dedica a apoiar indivíduos enfrentando desafios de saúde física e mental, oferecendo amor, compreensão e recursos. Eles desempenham um papel vital na promoção da saúde mental e no suporte a pacientes com doenças graves, proporcionando esperança e assistência a pessoas frequentemente isoladas e desamparadas.</p>
            <div class="marmitas-doadas">
                <div class="circle">70%</div>
                MARMITAS DOADAS
            </div>
        </div>
    </div>

    <?php
    if (isset($ongs)) {
        foreach ($ongs as $ong): ?>
            <div class="card">
                <div class="img">
                    <p><?= htmlspecialchars($ong['nome']); ?></p>
                </div>

                <div class="content">
                    <p><?= htmlspecialchars($ong['observacoes']); ?></p>
                    <div class="marmitas-doadas">
                        <div class="circle">
                            0%
                        </div>
                        MARMITAS DOADAS
                    </div>
                </div>
            </div>
    <?php endforeach;
    }
    ?>
</div>

<div class="form-right text-center" style="background-image: url('./assets/images/form-pattern.png')">

    <h2 class="headline-1 text-center">Contate-nos </h2>

    <p class="contact-label">Telefone:</p>

    <a href="tel:+88123123456" class="body-1 contact-number hover-underline">(11)981765432</a>

    <div class="separator"></div>

    <p class="contact-label">Localização:</p>

    <address class="body-4">
        Restaurant Naturalle, São Paulo, <br>
        123, SP
    </address>

    <p class="contact-label">Almoço:</p>

    <p class="body-4">
        Terça à Domingo<br>
        11:00h - 16:30h
    </p>

    <p class="contact-label">Jantar:</p>

    <p class="body-4">
        Terça à Domingo <br>
        17:00h - 23:30h
    </p>

</div>

</div>

</div>
</section>

<script src="./assets/js/scripts.js"></script>


<!-- 
- #FOOTER
-->

<?php
include('footer.php');
?>






<!-- 
- VOLTAR PARA O INÍCIO
-->

<a href="#top" class="back-top-btn active" aria-label="back to top" data-back-top-btn>
    <ion-icon name="chevron-up" aria-hidden="true"></ion-icon>
</a>





<!-- 
- LINK JS
-->
<script src="./assets/js/script.js"></script>



<!-- 
- LINKS
-->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>