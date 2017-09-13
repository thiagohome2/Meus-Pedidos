<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Candidato extends CI_Controller {

    public function __construct(){
        parent::__construct();
  
    }
    
    public function avaliacao_candidato(){
        
        $alerta= null;
        
        if (!empty($this->input->post('salvar'))){
              
            $this->load->library('form_validation');
            $this->form_validation->set_rules('nome', 'Nome','required|min_length[5]');
            $this->form_validation->set_rules('email', 'E-mail', 'required|valid_email|is_unique[candidatos.email]');
            if ($this->form_validation->run() == FALSE){

                $alerta = array(
                        "class" => "danger",
                        "mansagem" => "Atenção!" . validation_errors()
                    );
            }else{
                
                $dados['nome'] = $this->input->post('nome');
                $dados['email'] = $this->input->post('emali');
                $dados['html'] = $this->input->post('html');
                $dados['css'] = $this->input->post('css');
                $dados['javascript'] = $this->input->post('javascript');
                $dados['python'] = $this->input->post('python');
                $dados['django'] = $this->input->post('django');
                $dados['android'] = $this->input->post('android');

                //Salva os dados na base
                if($this->db->insert('candidato',$dados)){
                      
                    //Regra de Negócio para encaminhamento do formulário
                    
                    
                    
                    
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
        $this->load->view('layout/menu-top-lateral', $data);
        $this->load->view('site/avaliacao_candidato', $data);
        $this->load->view('layout/footer', $data);
        
    }
 
}
