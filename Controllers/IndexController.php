<?php

class IndexController extends Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $titulo = "Mi Titulo";
        $parrafo = "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident maxime, obcaecati pariatur alias dolore voluptas qui quidem, dolorum eligendi mollitia doloremque sit doloribus in et placeat accusantium culpa officia debitis!
        Eum, quas ex ullam laudantium sit, excepturi tempore architecto eveniet ipsum maiores veniam itaque! Fugiat voluptatem adipisci repudiandae itaque quod. Impedit ex incidunt laudantium natus est ipsum mollitia quasi veniam.
        Repellendus deserunt quasi enim veritatis. Atque vel voluptatum minima inventore! Dolorem sunt enim itaque iure nostrum officiis sapiente ex, cumque tenetur natus fugiat quisquam quidem excepturi tempore non modi minima.
        Delectus earum consectetur voluptatem explicabo laboriosam provident, nostrum consequatur doloremque tempora ut, distinctio quas iusto assumenda. Dolores numquam tempora repellendus et officiis perspiciatis earum neque. Asperiores impedit neque ipsa officia?
        Quasi ea quas, corporis eaque deleniti nemo at? Voluptas laboriosam, expedita reiciendis cumque magnam quasi facere sint non. Fugit eveniet facere illo perspiciatis vel aut voluptas at ipsa distinctio accusamus.
        Dolor id ut, at suscipit quod nemo iusto nostrum ullam eum, nisi incidunt quia illo quos alias vitae doloremque perferendis harum natus modi aliquid nobis in. Eligendi, maxime quibusdam. Reiciendis.
        Saepe illo non, aperiam possimus ad dolor alias inventore harum temporibus, atque suscipit amet? Molestiae fugit illum officiis unde! Iure alias fuga culpa obcaecati quas. Ex suscipit quos perferendis cumque.
        Dolor facilis voluptate voluptatum amet incidunt optio, similique voluptas molestiae aperiam, perferendis beatae velit minus quia error explicabo reprehenderit. Nisi, suscipit! Et unde mollitia esse expedita recusandae aspernatur ipsum voluptatem?
        Ullam eaque vel, debitis alias, dolorum dicta, nostrum nobis perspiciatis quae dignissimos modi? Vel eaque accusamus architecto quaerat recusandae culpa, cupiditate quod debitis nesciunt quia eum itaque. Dignissimos, consectetur quisquam!
        Pariatur fuga iste officiis, ullam magnam nesciunt natus provident labore voluptates praesentium mollitia earum autem, quis eius ipsam? Facere quis pariatur nulla atque et autem quibusdam alias, adipisci ratione sed?";
        $this->view->render("index", compact("titulo", "parrafo"));
    }
}