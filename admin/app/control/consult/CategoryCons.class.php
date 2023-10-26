<?php

class CategoryCons extends TPage
{
    private $datagrid;
    private $loaded;
    private $pageNavigation;
    private $pageLimit;
    private $form;
    
    //use Adianti\Base\AdiantiStandardListTrait;
    
    public function __construct()
    {
        parent::__construct();
        
        $this->form = new TQuickForm('form_busca_category');
        $this->form->class = 'tform';
        
        $busca  = new TEntry('busca');

        $this->form->addQuickField(_t('Category'),$busca,300);
        $this->form->addQuickAction(_t('Search'), new TAction(array($this,'onReload')),'ico_find.png');
        
        // creates one datagrid
        $this->datagrid = new TDataGrid;
        
        $id = new TDataGridColumn('id', 'ID', 'left', 100);
        $description = new TDataGridColumn('description', _t('Description'), 'left', 300);
        
        // add the columns to the datagrid, with actions on column titles, passing parameters
        $this->datagrid->addColumn($id);
        $this->datagrid->addColumn($description);
        
        //Botão Editar
        $action1 = new TDataGridAction(['CategoryForm', 'onEdit'],['id' => '{id}' ]);
        
        $action2 = new TDataGridAction(['CategoryForm', 'onDelete'],['id' => '{id}' ] );

        //Ação de ordenar
        $order2 = new TAction(array($this,'onReload'));
        $order2->setParameter('order','description');
        
        $description->setAction($order2);
        
        //Adicionando ações a datagrid
        $this->datagrid->addAction($action1, _t('Edit'), 'fa:search blue');
        $this->datagrid->addAction($action2 ,_t('Delete'), 'far:trash-alt red');
        
        
        // creates the datagrid model
        $this->datagrid->createModel();
        
        $this->pageNavigation = new TPageNavigation;
        $this->pageNavigation->setAction(new TAction(array($this, 'onReload')));
        $this->pageNavigation->setWidth($this->datagrid->getWidth());
        
        // wrap the page content using vertical box
        $vbox = new TVBox;
        $vbox->add($this->form);
        $vbox->add($this->datagrid);
        $vbox->add($this->pageNavigation);
        //$vbox->style = 'width: 100%';
        
        parent::add($vbox);
    }
    
    /**
     * Load the data into the datagrid
     */
    public function onReload($param = null)
    {
        $pageLimit = 20;
        try {
            $data = $this->form->getData();
            
            TTransaction::open('communication');
            $repository = new TRepository('Category');
      
            $criteria1 = new TCriteria;
            $criteria1->add(new TFilter('description','like',"%{$data->busca}%"));

            
            $criteria = new TCriteria;
            $criteria->setProperties($param);
            $criteria->setProperties('limit',$pageLimit);

            $criteria->add($criteria1);
            
            $objects = $repository->load($criteria);
            $this->datagrid->clear();
            
            if($objects){
                foreach($objects as $objects){
                    $this->datagrid->addItem($objects);
                }
            } 
            $criteria->resetProperties();
            
            $count = $repository->count($criteria);
            
            $this->pageNavigation->setCount($count);
            $this->pageNavigation->setProperties($param);
            $this->pageNavigation->setLimit($pageLimit);
            
            TTransaction::close();
            $this->loaded = TRUE;
            
        } catch (Exception $e){
            new TMessage('error', $e->getMessage());
            TTransaction::rollback();
        }
        
    }
  
}
