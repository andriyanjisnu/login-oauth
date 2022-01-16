<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class M_crud extends CI_Model
{ 
    
    // function __construct()
    // { 
    //     parent::__construct();    
    // } 

    function procedure()
    { 
        if($this->db->trans_status()===FALSE)
        { 
            $this->db->trans_rollback(); 
            return FALSE; 
        }
        else
        { 
            $this->db->trans_commit(); 
            return TRUE; 
        } 
    } 

    function add($table,$data)
    {
        $this->db->trans_begin(); 
        $this->db->insert($table,$data); 
         
        if($this->procedure()===TRUE)
        { 
            return TRUE;
        }
        else
        { 
            return FALSE; 
        } 
    } 

    function add_return_id($table,$data)
    {
        $this->db->insert($table,$data); 
        $id = $this->db->insert_id();
        return $id;
    }

    function edit($table,$data,$where,$id)
    { 
        //$this->db->trans_begin(); 
        $this->db->where($where,$id) 
                 ->update($table,$data); 
         
        if($this->procedure()===TRUE)
        { 
            return $this->db->affected_rows(); 
        }
        else
        { 
            return -1; 
        } 
    } 

    function edit_two_where($table,$data,$where1,$id1,$where2,$id2)
    { 
        $this->db->trans_begin(); 
        $this->db->where($where1,$id1) 
                 ->where($where2,$id2) 
                 ->update($table,$data); 
         
        if($this->procedure()===TRUE)
        { 
            return $this->db->affected_rows(); 
        }
        else
        { 
            return -1; 
        } 
    } 

    function delete($table,$where,$id)
    { 
        $this->db->trans_begin(); 
        $this->db->where($where,$id) 
                 ->delete($table); 
                  
        if($this->procedure()==TRUE)
        { 
            return TRUE; 
        }
        else
        { 
            return FALSE; 
        } 
    } 

    function delete_two_where($table,$where1,$id1,$where2,$id2)
    { 
        $this->db->trans_begin(); 
        $this->db->where($where1,$id1) 
                 ->where($where2,$id2) 
                 ->delete($table); 
                  
        if($this->procedure()==TRUE)
        { 
            return TRUE; 
        }
        else
        { 
            return FALSE; 
        } 
    } 

    function delete_three_where($table,$where1,$id1,$where2,$id2,$where3,$id3)
    { 
        $this->db->trans_begin(); 
        $this->db->where($where1,$id1) 
                 ->where($where2,$id2) 
                 ->where($where3,$id3) 
                 ->delete($table); 
                  
        if($this->procedure()==TRUE)
        { 
            return TRUE; 
        }
        else
        { 
            return FALSE; 
        } 
    } 

    function empty_whole_table($table)
    {
        //$this->db->empty_table($table);
        $this->db->truncate($table);
    }
   
    function get_records($table,$order,$by,$limit,$offset)
    { 
        $query=$this->db->order_by($order,$by)
                        ->limit($limit,$offset) 
                        ->get($table)
                        ->result_array(); 
        return $query; 
    } 

    function get_records_orderby_limit($table,$order,$by,$limit)
    { 
        $query=$this->db->order_by($order,$by)
                        ->limit($limit) 
                        ->get($table)
                        ->result_array(); 
        return $query; 
    } 

    function get_records_one_where_orderby_limit($table,$where,$id,$order,$by,$limit)
    { 
        $query=$this->db->where($where,$id) 
                        ->order_by($order,$by)
                        ->limit($limit) 
                        ->get($table)
                        ->result_array(); 
        return $query; 
    } 

    function get_records_two_where_orderby_limit($table,$where1,$id1,$where2,$id2,$order,$by,$limit)
    { 
        $query=$this->db->where($where1,$id1) 
                        ->where($where2,$id2) 
                        ->order_by($order,$by)
                        ->limit($limit) 
                        ->get($table)
                        ->result_array(); 
        return $query; 
    } 

    function get_records_two_where_orderby_without_limit($table,$where1,$id1,$where2,$id2,$order,$by)
    { 
        $query=$this->db->where($where1,$id1) 
                        ->where($where2,$id2) 
                        ->order_by($order,$by)
                        ->get($table)
                        ->result_array(); 
        return $query; 
    } 

    function get_records_three_where_orderby_limit($table,$where1,$id1,$where2,$id2,$where3,$id3,$order,$by,$limit)
    { 
        $query=$this->db->where($where1,$id1) 
                        ->where($where2,$id2) 
                        ->where($where3,$id3) 
                        ->order_by($order,$by)
                        ->limit($limit) 
                        ->get($table)
                        ->result_array(); 
        return $query; 
    } 

    function get_records_four_where_orderby_limit($table,$where1,$id1,$where2,$id2,$where3,$id3,$id4,$order,$by,$limit)
    { 
        $query=$this->db->where($where1,$id1) 
                        ->where($where2,$id2) 
                        ->where($where3,$id3) 
                        ->where('news_publish_date <=',$id4) 
                        ->order_by($order,$by)
                        ->limit($limit) 
                        ->get($table)
                        ->result_array(); 
        return $query; 
    } 

    function get_records_one_where($table,$where,$id,$order,$by,$limit,$offset)
    { 
        $query=$this->db->where($where,$id) 
                        ->order_by($order,$by)
                        ->limit($limit,$offset) 
                        ->get($table)
                        ->result_array(); 
        return $query; 
    } 

    function get_records_two_where($table,$where1,$id1,$where2,$id2,$order='',$by='',$limit='',$offset='')
    { 
        $query=$this->db->where($where1,$id1) 
                        ->where($where2,$id2) 
                        ->order_by($order,$by)
                        ->limit($limit,$offset) 
                        ->get($table)
                        ->result_array(); 
        return $query; 
    } 

    function get_row($table,$where,$id)
    { 
        $query=$this->db->where($where,$id) 
                        ->limit(1)
                        ->get($table) 
                        ->row_array(); 
        return $query; 
    } 

    function get_join_kip($table,$table2,$coloumn,$coloumn2,$where,$id)
    { 
        $query=$this->db->select('kip.*, kip_stories.banner, kip_stories.slug, kip_stories.title, kip_stories.excerpt, kip_stories.published')
                        ->where($table.'.'.$where,$id) 
                        ->join($table2,$table2.'.'.$coloumn2.'='.$table.'.'.$coloumn,'left')
                        ->get($table) 
                        ->row_array(); 
        return $query; 
    }

    function get_kip_limit1($table,$table2,$coloumn,$coloumn2,$order,$by)
    { 
        $query=$this->db->select('kip.*, kip_stories.banner, kip_stories.slug, kip_stories.title, kip_stories.excerpt, kip_stories.published')
                        ->join($table2,$table2.'.'.$coloumn2.'='.$table.'.'.$coloumn,'left')
                        ->order_by($order,$by)
                        ->limit(1)
                        ->get($table) 
                        ->result_array(); 
        return $query; 
    }

    function get_kip_limit1_offset($table,$table2,$coloumn,$coloumn2,$order,$by)
    { 
        $query=$this->db->select('kip.*, kip_stories.banner, kip_stories.slug, kip_stories.title, kip_stories.excerpt, kip_stories.published')
                        ->join($table2,$table2.'.'.$coloumn2.'='.$table.'.'.$coloumn,'left')
                        ->order_by($order,$by)
                        ->limit(50,1)
                        ->get($table) 
                        ->result_array(); 
        return $query; 
    }


    function get_row_join_order_by($select='*',$table,$table2,$coloumn,$coloumn2,$where,$id)
    { 
        $query=$this->db->select($select)
                        ->where($table.'.'.$where,$id) 
                        ->join($table2,$table2.'.'.$coloumn2.'='.$table.'.'.$coloumn,'left')
                        ->get($table) 
                        ->row_array(); 
        return $query; 
    }

    function get_row_orderby($table,$where,$id,$order,$by)
    { 
        $query=$this->db->where($where,$id) 
                        ->order_by($order,$by)
                        ->limit(1)
                        ->get($table) 
                        ->row_array(); 
        return $query; 
    } 

    function get_row_orderby_limit_one($table,$where,$id,$order,$by)
    { 
        $query=$this->db->where($where,$id) 
                        ->order_by($order,$by)
                        ->limit(1) 
                        ->get($table)
                        ->row_array(); 
        return $query; 
    } 

    function get_row_two_where($table,$where1,$id1,$where2,$id2)
    { 
        $query=$this->db->where($where1,$id1) 
                        ->where($where2,$id2) 
                        ->limit(1)
                        ->get($table) 
                        ->row_array(); 
        return $query; 
    } 

    function get_row_two_where_orderby($table,$where1,$id1,$where2,$id2,$order,$by)
    { 
        $query=$this->db->where($where1,$id1) 
                        ->where($where2,$id2) 
                        ->order_by($order,$by)
                        ->limit(1)
                        ->get($table) 
                        ->row_array(); 
        return $query; 
    } 

    function get_row_three_where($table,$where1,$id1,$where2,$id2,$where3,$id3)
    { 
        $query=$this->db->where($where1,$id1) 
                        ->where($where2,$id2) 
                        ->where($where3,$id3) 
                        ->limit(1)
                        ->get($table) 
                        ->row_array(); 
        return $query; 
    } 

    function get_list($table)
    { 
        $query=$this->db->get($table) 
                        ->result_array(); 
        return $query; 
    } 

    // function get_list_join($table,$table_join,$field_table,$field_join)
    // { 
    //     $query=$this->db->select('title, content, date');
    //                     foreach($join_table as $v){
    //                         ->join($v['table_join'], $v['table_join'].'.'.$v['join_field'].' = '.$table.'.'.$v['table_join']);
    //                     }
    //                     ->where($where,$id) 
    //                     ->result_array(); 
    //     pre($this->db->last_query());
    //     return $query; 
    // } 

    function get_list_order_by($table,$order,$by)
    { 
        $query=$this->db->order_by($order,$by)
                        ->get($table) 
                        ->result_array(); 
        return $query; 
    } 

    function get_list_join_order_by($select='*',$table,$table2,$coloumn,$coloumn2,$order,$by)
    { 
        $query=$this->db->select($select)
                        ->order_by($order,$by)
                        ->join($table2,$table2.'.'.$coloumn2.'='.$table.'.'.$coloumn,'left')
                        ->get($table) 
                        ->result_array(); 
        return $query; 
    }

    function get_list_join_order_by_limit($select='*',$table,$table2,$coloumn,$coloumn2,$order,$by,$limit)
    { 
        $query=$this->db->select($select)
                        ->order_by($order,$by)
                        ->limit($limit)
                        ->join($table2,$table2.'.'.$coloumn2.'='.$table.'.'.$coloumn,'left')
                        ->get($table) 
                        ->result_array(); 
        return $query; 
    }  

    function get_list_two_order_by($table,$order1,$by1,$order2,$by2)
    { 
        $query=$this->db->order_by($order1,$by1)
                        ->order_by($order2,$by2)
                        ->get($table) 
                        ->result_array(); 
        return $query; 
    } 

    function get_list_by_id($table,$where,$id){ 
        $query=$this->db->where($where,$id) 
                        ->get($table) 
                        ->result_array(); 
        return $query; 
    } 
    function get_list_by_id_in($table,$where,$id){ 
        $query=$this->db->where_in($where,$id) 
                        ->get($table) 
                        ->result_array(); 
        return $query; 
    } 

    function get_list_one_where($table,$where,$id,$order,$by)
    { 
        $query=$this->db->where($where,$id) 
                        ->order_by($order,$by)
                        ->get($table) 
                        ->result_array(); 
        return $query; 
    } 

    function get_list_one_where_in($table,$where,$id,$order,$by)
    { 
        $query=$this->db->where_in($where,$id) 
                        ->order_by($order,$by)
                        ->get($table) 
                        ->result_array(); 
        return $query; 
    } 


    function get_list_one_where_limit($table,$where1,$id1,$order,$by,$limit)
    { 
        $query=$this->db->where($where1,$id1) 
                        ->order_by($order,$by)
                        ->limit($limit) 
                        ->get($table)
                        ->result_array(); 
        return $query; 
    } 

    function get_list_one_where_limit_ignore($table,$where1,$id1,$where2,$id2,$order,$by,$limit)
    { 
        $query=$this->db->where($where1,$id1) 
                        ->where_not_in($where2,$id2) 
                        ->order_by($order,$by)
                        ->limit($limit) 
                        ->get($table)
                        ->result_array(); 
        return $query; 
    } 

    function get_list_kip($table,$table2,$coloumn,$coloumn2,$where,$id,$order,$by,$limit)
    { 
        $query=$this->db->select('kip.*, kip_stories.banner, kip_stories.slug, kip_stories.title, kip_stories.excerpt, kip_stories.published')
                        ->where($table.'.'.$where,$id) 
                        ->join($table2,$table2.'.'.$coloumn2.'='.$table.'.'.$coloumn,'left')
                        ->order_by($order,$by)
                        ->limit($limit) 
                        ->get($table) 
                        ->row_array(); 
        return $query; 
    }

    function get_list_two_where($table,$where1,$id1,$where2,$id2,$order,$by)
    { 
        $query=$this->db->where($where1,$id1) 
                        ->where($where2,$id2)
                        ->order_by($order,$by)
                        ->get($table) 
                        ->result_array(); 
        return $query;
    }

    function get_list_where_in_join($table,$table_join,$join_query,$where1,$id1,$order,$by)
    { 
        $query=$this->db->select('articles.*,categories.name_idn as nama_kategori,wim.nama')
                        ->where_in($table.'.'.$where1,$id1) 
                        ->join($table_join,$join_query,'left')
                        ->join('wim','articles.admin_id=wim.id','left')
                        ->order_by($table.'.'.$order,$by)
                        ->get($table) 
                        ->result_array(); 
        return $query;
    }

    function get_list_two_where_limit($table,$where1,$id1,$where2,$id2,$order,$by,$limit)
    { 
        $query=$this->db->where($where1,$id1) 
                        ->where($where2,$id2)
                        ->order_by($order,$by)
                        ->limit($limit)
                        ->get($table) 
                        ->result_array(); 
        return $query;
    }

    function get_list_or_where_limit($table,$where1,$id1,$where2,$id2,$order,$by,$limit,$offset)
    { 
        $query=$this->db->where($where1,$id1) 
                        ->or_where($where2,$id2)
                        ->order_by($order,$by)
                        ->limit($limit,$offset)
                        ->get($table) 
                        ->result_array(); 
        return $query;
    }

    function get_list_two_orwhere($table,$where1,$id1,$order,$by)
    { 
        $where_au = "(product_details_product_id = '268' OR product_details_product_id = '269' )";
        $query=$this->db->where($where1,$id1) 
                        ->where($where_au)
                        ->order_by($order,$by)
                        ->get($table) 
                        ->result_array(); 
        return $query;
    }
    function get_list_two_where_without_orderby($table,$where1,$id1,$where2,$id2)
    { 
        $query=$this->db->where($where1,$id1) 
                        ->where($where2,$id2)
                        ->get($table) 
                        ->result_array(); 
        return $query;
    }

    function get_list_two_where_one_like($table,$where1,$id1,$where2,$id2,$where3,$id3,$order,$by)
    { 
        $query=$this->db->where($where1,$id1) 
                        ->where($where2,$id2)
                        ->like($where3,$id3) 
                        ->order_by($order,$by)
                        ->get($table) 
                        ->result_array(); 
        return $query;
    } 

    function get_list_three_where($table,$where1,$id1,$where2,$id2,$where3,$id3,$order,$by)
    { 
        $query=$this->db->where($where1,$id1) 
                        ->where($where2,$id2)
                        ->where($where3,$id3) 
                        ->order_by($order,$by)
                        ->get($table) 
                        ->result_array(); 
        return $query;
    } 

    function get_list_one_where_random($table,$where1,$id1,$primary,$limit)
    { 
        $query=$this->db->where($where1,$id1) 
                        ->order_by($primary, 'random')
                        ->limit($limit)
                        ->get($table) 
                        ->result_array(); 
        return $query; 
    } 

    function get_list_random($table,$where1,$id1,$where2,$id2,$primary,$limit)
    { 
        $query=$this->db->where($where1,$id1) 
                        ->where($where2,$id2) 
                        ->order_by($primary, 'random')
                        ->limit($limit)
                        ->get($table) 
                        ->result_array(); 
        return $query; 
    } 



    function get_count($table)
    { 
        $query=$this->db->count_all($table); 
        return $query; 
    } 
    function get_count_one_where($table,$where,$id)
    { 
        $query=$this->db->where($where,$id) 
                        ->count_all_results($table); 
        return $query; 
    } 
    function get_count_or_where($table,$where,$id,$where2,$id2)
    { 
        $query=$this->db->where($where,$id) 
                        ->or_where($where2,$id2)
                        ->count_all_results($table); 
        return $query; 
    } 

    function get_count_two_where($table,$where1,$id1,$where2,$id2)
    { 
        $query=$this->db->where($where1,$id1) 
                        ->where($where2,$id2) 
                        ->count_all_results($table); 
        return $query; 
    } 

    function get_count_three_where($table,$where1,$id1,$where2,$id2,$where3,$id3)
    { 
        $query=$this->db->where($where1,$id1) 
                        ->where($where2,$id2) 
                        ->where($where3,$id3) 
                        ->count_all_results($table); 
        return $query; 
    } 

    function get_count_two_where_one_like($table,$where1,$id1,$where2,$id2,$where3,$id3)
    { 
        $query=$this->db->where($where1,$id1) 
                        ->where($where2,$id2) 
                        ->like($where3,$id3) 
                        ->count_all_results($table); 
        return $query; 
    } 

    function search($table,$where,$id)
    { 
        $query=$this->db->like($where,$id) 
                        ->get($table) 
                        ->result(); 
        return $query; 
    }   
    
    function search_one_row($table,$where,$id)
    { 
        $query=$this->db->like($where,$id) 
                        ->limit(1) 
                        ->get($table) 
                        ->row_array(); 
        return $query; 
    }   
    
    function get_count_search($table,$where,$id)
    { 
        $query=$this->db->like($where,$id) 
                        ->count_all_results($table); 
        return $query; 
    } 

    function search_limit($table,$where,$id,$order,$by,$limit,$offset)
    { 
        $query=$this->db->like($where,$id) 
                        ->order_by($order,$by)
                        ->limit($limit,$offset) 
                        ->get($table)
                        ->result_array(); 
        return $query; 
    }  

    function get_all_limit_and_offset($table,$where1,$id1,$order,$by,$limit,$offset)
	{
		$query=$this->db->where($where1,$id1) 
						->order_by($order,$by)
						->limit($limit,$offset) 
						->get($table)
						->result_array(); 
		return $query; 
    }
    
    function get_all_limit_and_offset2($table,$where1,$id1,$where2,$id2,$order,$by,$limit,$offset)
	{
        $query=$this->db->where($where1,$id1) 
                        ->where($where2,$id2)
						->order_by($order,$by)
						->limit($limit,$offset) 
						->get($table)
						->result_array(); 
		return $query; 
	}

    // News

    function get_all_news_limit_and_offset($table,$where1,$id1,$id2,$order,$by,$limit,$offset)
    { 
        $query=$this->db->where($where1,$id1) 
                        ->where('created_at <=',$id2)
                        ->where('category_id <=',1) 
                        ->order_by($order,$by)
                        ->limit($limit,$offset)
                        ->get($table)
                        ->result_array(); 
        return $query; 
    }

    function get_all_dokter_tanya_limit_and_offset($table,$where1,$id1,$order,$by,$limit,$offset)
    { 
        $query=$this->db->select('dokter_tanya.*,dokter.nama as nama_dokter,dokter.id as dokter_id')
                        ->where($where1,$id1) 
                        ->order_by($order,$by)
                        ->limit($limit,$offset)
                        ->join('dokter','dokter_tanya.dokter_id = dokter.id')
                        ->get($table)
                        ->result_array(); 
        return $query; 
    }

    function get_all_beauty_lounge_limit_and_offset($table,$where1,$id1,$id2,$id3,$order,$by,$limit,$offset)
    {
        $query=$this->db->select('articles.*,categories.name_idn as category_name')
                        ->where('articles.'.$where1,$id1) 
                        ->where('articles.'.'category_id =',$id2)
                        ->or_where('articles.'.'category_id =',$id3) 
                        ->join('categories','categories.id = articles.category_id')
                        ->order_by($order,$by)
                        ->limit($limit,$offset)
                        ->get($table)
                        ->result_array();
        return $query; 
    }
    function get_count_all_beauty_lounge($table,$where1,$id1,$id2)
    { 
        $query=$this->db->where($where1,$id1) 
                        ->where('created_at <=',$id2) 
                        ->where('category_id =',3)
                        ->or_where('category_id =',5) 
                        ->count_all_results($table);
        return $query; 
    }

    function get_count_all_beauty_cat($table,$where1,$id1,$id2,$id3)
    {
        $query=$this->db->where($where1,$id1) 
                        ->where('created_at <=',$id2) 
                        ->where('category_id =',$id3)
                        ->count_all_results($table);
        return $query; 
    }

    function get_all_beauty_limit_and_offset($table,$where1,$id1,$id2,$order,$by,$limit,$offset)
    { 
        $query=$this->db->select('articles.*,categories.name_idn as category_name')
                        ->where('articles.'.$where1,$id1) 
                        ->where('articles.'.'category_id =',$id2) 
                        ->join('categories','categories.id = articles.category_id')
                        ->order_by($order,$by)
                        ->limit($limit,$offset)
                        ->get($table)
                        ->result_array();
        return $query; 
    }

    function get_all_beauty_limit_and_offset_in($table,$where1,$id1,$id2,$order,$by,$limit,$offset)
    { 
        $query=$this->db->select('articles.*,categories.name_idn as category_name')
                        ->where('articles.'.$where1,$id1) 
                        ->where_in('articles.'.'category_id ',$id2) 
                        ->join('categories','categories.id = articles.category_id')
                        ->order_by($order,$by)
                        ->limit($limit,$offset)
                        ->get($table)
                        ->result_array();
        return $query; 
    }

    function get_count_all_news($table,$where1,$id1,$id2)
    { 
        $query=$this->db->where($where1,$id1) 
                        ->where('created_at <=',$id2) 
                        ->where('category_id =',1) 
                        ->count_all_results($table);
        return $query; 
    }

    function get_sub_category_article_list_by_id($table,$where,$id){ 
        $query=$this->db->select('id')
                        ->where($where,$id) 
                        ->get($table) 
                        ->result_array(); 
        return $query; 
    } 

    public function get_menu_all(array $items, $pid = 0)
    {
        $output = array();

        # loop through the items
        foreach ($items as $item) {

            # Whether the parent_id of the item matches the current $pid
            if ((int) $item['parent_id'] == $pid){

                # Call the function recursively, use the item's id as the parent's id
                # The function returns the list of children or an empty array()
                if ($children = $this->get_menu_all($items, $item['id'])) {

                    # Store all children of the current item
                    $item['submenu'] = $children;
                }

                # Fill the output
                $output[] = $item;
            }
        }

        return $output;
    }

    function get_list_cities($region){
        $r = $this->db->select('cities.id,cities.name_idn,regions.name_idn as name_region, regions.id as region_id')            
                 ->where_in('region_id',$region)
                 ->join('regions', 'regions.id = cities.region_id')
                 #  ->group_by('regions.name_idn')
                 ->get('cities');
        return $r->result_array();
       
    }

    function get_list_user_event_wim($data)
    { 
        $event = "SELECT wim_event_pilar,wim_event_city FROM wim_event WHERE wim_event_id=".$data['id_event'];
        $e = $this->db->query($event)->row_array();



        if((!empty($data['pilar'])AND $data['pilar']==1) AND empty($data['kota'])) {
         $r = $this->db->select('email')            
                 ->where('pilar',$e['wim_event_pilar'])
                 ->get('wim');
        }

        if((!empty($data['kota'])AND $data['kota']==1) AND empty($data['pilar'])) {
         $r = $this->db->select('email')            
                 ->where('kota',$e['wim_event_city'])
                 ->get('wim');
        }

        if(!empty($data['kota']) AND !empty($data['pilar'])) {
         $r = $this->db->select('email')            
                 ->where('kota',$e['wim_event_city'])
                 ->or_where('pilar',$e['wim_event_pilar'])
                 ->get('wim');
        }
         
         
        return $r->result_array();
    }

    function get_wardah_ramadan_19($table,$where1,$id1,$order,$by)
    { 
        $query=$this->db->where($where1,$id1) 
                        ->where('created_at >','2019-05-01 00:00:00')
                        ->order_by($order,$by)
                        ->get($table) 
                        ->result_array(); 
        return $query;
    }

    function get_cities($province_id){
        $query = $this->db->get_where('cities', array('province_id' => $province_id));
        return $query;
    }

}