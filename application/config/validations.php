<?php defined('BASEPATH') OR exit('No direct script access allowed');

$config = array(
        'items' => array(
                array(
                        'field' => 'productCode',
                        'label' => 'Product Code',
                        'rules' => 'trim|required|xss_clean'
                ),
                array(
                        'field' => 'productName',
                        'label' => 'Product Name',
                        'rules' => 'trim|required|xss_clean'
                ),
        ),
        'purchase_order' => array(
                array(
                        'field' => 'productName',
                        'label' => 'Product Name',
                        'rules' => 'trim|required|xss_clean'
                ),
                array(
                        'field' => 'quantity',
                        'label' => 'Quantity',
                        'rules' => 'trim|required|xss_clean'
                ),
                array(
                        'field' => 'amount',
                        'label' => 'Amount',
                        'rules' => 'trim|required|xss_clean'
                ),
                array(
                        'field' => 'supplier',
                        'label' => 'Supplier',
                        'rules' => 'trim|required|xss_clean'
                ),
                array(
                        'field' => 'supp_address',
                        'label' => 'Supplier Address',
                        'rules' => 'trim|required|xss_clean'
                ),
                array(
                        'field' => 'date_payment',
                        'label' => 'Payment Date',
                        'rules' => 'trim|required|xss_clean'
                ),
                array(
                        'field' => 'date_delivered',
                        'label' => 'Delivered Date',
                        'rules' => 'trim|required|xss_clean'
                ),
        ),
        'retail' => array(
                array(
                        'field' => 'productName',
                        'label' => 'Product Name',
                        'rules' => 'trim|required|xss_clean'
                ),
                array(
                        'field' => 'quantity',
                        'label' => 'Quantity',
                        'rules' => 'trim|required|xss_clean'
                ),
                array(
                        'field' => 'amount',
                        'label' => 'Amount',
                        'rules' => 'trim|required|xss_clean'
                ),
                array(
                        'field' => 'unitDescription',
                        'label' => 'Unit Description',
                        'rules' => 'trim|required|xss_clean'
                ),
        )
);