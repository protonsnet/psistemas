<?php
use Adianti\Widget\Form\TEntry;
/**
 * @author  Anchieta Acacio
 */

class CategoryForm extends TPage
{
    private $form;
    
    /**
     * Class constructor
     * Creates the page
     */
    public function __construct()
    {
        parent::__construct();
        
        $this->form = new BootstrapFormBuilder('form_category');
        $this->form->setFormTitle(_t('Category'));
        $this->form->setFieldSizes('100%');
        
        $id          = new TEntry('id');
        $description = new TEntry('description');
       
        $id->setEditable(false);
        
        $row = $this->form->addFields( [ new TLabel('ID'),$id ]
                                       );
        $row->layout = ['col-sm-2'];
        
        $row = $this->form->addFields( [ new TLabel(_t('Description')), $description ]
                                       );
        $row->layout = ['col-sm-6' ];
        
        $this->form->addAction(_t('Save'), new TAction(array($this, 'onSave')), 'far:check-circle green');
        $this->form->addAction(_t('List'), new TAction(array($this,'returnlist')),'fa:search blue');
        
        // wrap the page content using vertical box
        $vbox = new TVBox;
        $vbox->style = 'width: 100%';
        $vbox->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        $vbox->add($this->form);
        parent::add($vbox);
    }

    /*
    /
    */
    public function onSave($param)
    {
        
        try
        {
            TTransaction::open('communication');
            
            // form validations
            $this->form->validate();
            
            // get form data
            $data         = $this->form->getData();

            // store product
            $object = new Category;
            $object->fromArray( (array) $data);
            $object->store();
            
            // send id back to the form
            $data->id = '';
            $data->description = '';
            $this->form->setData($data);
            
            TTransaction::close();
            TToast::show('success',_t('Record saved'));
            
            //AdiantiCoreApplication::loadPage('CategoryCons');
        }
        catch (Exception $e)
        {
            $this->form->setData($this->form->getData());
            new TMessage('error', $e->getMessage());
            TTransaction::rollback();
        }

    }
    
    public function onEdit( $param )
    {
 
        try
        {
            if (isset($param['id']))
            {
                TTransaction::open('communication');
                $object = new Category( $param['id'] );

                $this->form->setData($object);
                TTransaction::close();
                return $object;

            }
            else
            {
                $this->form->clear();
            }
        }
        catch (Exception $e) // in case of exception
        {
            new TMessage('error', $e->getMessage());
            TTransaction::rollback();
        }
    }
    
    /**
     * Método onDelete
     */
    public function onDelete( $param )
    {
        $action1 = new TAction(array($this, 'delete'));
        $action2 = new TAction(array($this, 'returnlist'));

        $action1->setParameter('id',$param['id']);
        $action2->setParameter('id', 0);
        
        // shows the question dialog
        new TQuestion(_t("Confirm deletion?"), $action1, $action2);
    }
    
    public function delete( $param )
    {
        try{
            
            if (isset($param['id']))
            {
                TTransaction::open('communication');
                $object = new Category( $param['id'] );

                $object->delete($param['id']);
            
                TToast::show('info',_t('Successfully deleted record'));
            
                TTransaction::close();

                $this->returnlist();
                
            }
            
        } catch (Exception $e){
            new TMessage('error', $e->getMessage());
            TTransaction::rollback();
        }
    }

    public function returnlist()
    {
        AdiantiCoreApplication::loadPage('CategoryCons');
    }
}