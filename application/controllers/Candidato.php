<?php

//defined('BASEPATH') OR exit('No direct script access allowed');


class Candidato extends CI_Controller {

    public function __construct(){
        parent::__construct();
        
        //Teste Nativo do Codigniter
        //$this->load->library('unit_test');
    }
    
    public function filtro($habilidade){
        if ($habilidade >= 7){
            
            return TRUE;
            
        }else{
            
            return FALSE;
        }
    }
    
    public function envia_email($tipo,$email){
        //Menssagem Padraão
        $menssagen ="Obrigado por se candidatar, assim que tivermos uma vaga disponível<br/> "
                . "para programador ".$tipo." entraremos em contato.";
        
        //Mecanismo de envio de email
        $this->load->library('email');
        
        //configuração do email
        $config['protocol'] = 'smtp';
        //$config['mailpath'] = '/usr/sbin/sendmail';
        $config['smtp_host'] = 'smtp.tdaweb.com.br';
        $config['smtp_user'] = 'teste@tdaweb.com.br';
        $config['smtp_pass'] = '1laPoak3$ta%tsyq91';
        $config['smtp_port'] = '587';
        $config['smtp_timeout'] = '5';
        $config['smtp_keepalive'] = FALSE;
        $config['mailtype'] = 'html';
        $config['charset'] = 'utf-8';
        $config['wordwrap'] = TRUE;
        
        //Envio email
        $this->email->initialize($config);
        $this->email->from('teste@tdaweb.com.br', 'Thiago de Oliveira');
        $this->email->to($email);
        $this->email->subject('Obrigado por se candidatar');
        $this->email->message($menssagen);
        
        //echo "Enviado!";
        $this->email->send();
        
        return TRUE;
    }
    
    //Envio de email setor Front-End
    public function aptofrontend($html,$css,$js,$email){
        
        $tipo = "Front-End";
        
        //Se possui pontuação acima de 7 nessa 3 habilidades envia o email
        if($html && $css && $js){
                        
            //envia o email
            
                $this->envia_email($tipo,$email);
            
            return TRUE;
        }else{
            return FALSE;
        }
    }
    
    //Envio de email setor Back-End
    public function aptobackend($python,$django,$email){
        
        $tipo = "Back-End";
        
        //Se possui pontuação acima de 7 nessa 2 habilidades envia o email
        if($python && $django){
                        
            //envia o email
            
                $this->envia_email($tipo,$email);
            
            
            return TRUE;
        }else{
            
            return FALSE;
        }
    }
    
    //Envio de email setor Mobile
    public function aptomobile($ios,$android,$email){
        
        $tipo = "Mobile";
                
        //Se possuir pontuação acima de 7 em uma ou outra habilidade envia o email
        if($ios || $android){
                        
            //envia o email
            
                $this->envia_email($tipo,$email);
            
            return TRUE;
        }else{
            return FALSE;
        }
    }
    
    
    //Formilário de Avaliação
    public function avaliacao(){
       
        $alerta= null;
        
        
        if ($this->input->post('salvar') == 'salvar'){
              
            $this->load->library('form_validation');
            $this->form_validation->set_rules('nome', 'nome','required|min_length[5]');
            $this->form_validation->set_rules('email', 'email', 'required|valid_email');
            
            if ($this->form_validation->run() == FALSE){

                $alerta = array(
                        "class" => "danger",
                        "mansagem" => "Atenção!" . validation_errors()
                    );
            }else{
                
                $nome = $this->input->post('nome');
                $email = $this->input->post('email');
                $html = $this->input->post('html');
                $css = $this->input->post('css');
                $js = $this->input->post('javascript');
                $python = $this->input->post('python');
                $django = $this->input->post('django');
                $ios = $this->input->post('ios');
                $android = $this->input->post('android');
                

                $dados['nome'] = $nome;
                $dados['email'] = $email;
                $dados['html'] = $html;
                $dados['css'] = $css;
                $dados['javascript'] = $js;
                $dados['python'] = $python;
                $dados['django'] = $django;
                $dados['ios'] = $ios;
                $dados['android'] = $android;
                $dados['data'] = date("Y-m-d H:i:s");
                
                 //print_r($dados); 
                
                //Salva os dados na base
                if($this->db->insert('candidato',$dados)){

                    //Regra de Negócio para encaminhamento do formulário
                   
                    $pontos = 0;
                    
                    //Qualificação Front-Ends
                    if($this->aptofrontend($this->filtro($html),$this->filtro($css),$this->filtro($js), $email)){
                       $pontos = 10;
                    }
                    
                    //Qualificação Back-End
                    if($this->aptobackend($this->filtro($python),$this->filtro($django),$email)){
                       $pontos = $pontos + 10;
                    }
                    
                    //Qualificação Mobile
                    if($this->aptomobile($this->filtro($ios),$this->filtro($android),$email)){
                       $pontos = $pontos + 10;
                    }
                    
                    if ($pontos == 0){
                        //Genérico
                        $tipo = "";
                        //envia o email
                    
                            $this->envia_email($tipo,$email);
                    }
                    
                    $alerta = array(
                         "class" => "success",
                         "mansagem" => "Suas Informações foram enviadas com sucesso!" 
                      );

                 }else{
                     $alerta = array(
                         "class" => "danger",
                         "mansagem" => "Atenção! Houve um erro ao adicionar seus formulário<br/>" 

                    );
                }
            }
        }    
        $titulo = array(
                        
                        "titulo" => "Avaliação Candidato",
                        "descricao" => ""
                    );
        
        $data = array(
                    "alerta" => $alerta,
                    "entidade" => "candidato",
                    "pagina" => "Avaliação Candidato",
                    "titulo" => $titulo,
                    "dados" => '' 
                );
        
       
            $this->load->view('layout/header', $data);
            if($alerta['class'] == 'success'){
                $this->load->view('site/fim_avaliacao', $data);
            }else{
                $this->load->view('site/avaliacao', $data);
            }
            $this->load->view('layout/footer', $data);
        
        
    }
 
}
