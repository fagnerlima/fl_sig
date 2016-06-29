<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Gera o array de configurações da library pagination.
 * 
 * @param $base_url string URL base.
 * @param $total_rows int Total de registros.
 * @param $per_page int Total de registros por página.
 * @param $uri_segment int Segmento da URL onde será indicado o número da página.
 * @param $num_links int Número de links antes e depois da página atual nos links de paginação.
 * @return array Configurações para inicialização da library pagination.
 */
function generate_pagination_config($base_url, $total_rows, $per_page, $uri_segment, $num_links)
{
    $config['base_url'] = $base_url;
    $config['total_rows'] = $total_rows;
    $config['per_page'] = $per_page;
    $config['uri_segment'] = $uri_segment;
    $config['num_links'] = $num_links;
    $config['use_page_numbers'] = true;
    $config['full_tag_open'] = '<nav><ul class="pagination">';
    $config['full_tag_close'] = '</ul></nav>';
    $config['first_link'] = 'Primeira';
    $config['first_tag_open'] = '<li>';
    $config['first_tag_close'] = '</li>';
    $config['last_link'] = 'Última';
    $config['last_tag_open'] = '<li>';
    $config['last_tag_close'] = '</li>';
    $config['prev_link'] = 'Anterior';
    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';
    $config['next_link'] = 'Próxima';
    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li class="active"><a href="#">';
    $config['cur_tag_close'] = '</a></li>';
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    
    return $config;
}