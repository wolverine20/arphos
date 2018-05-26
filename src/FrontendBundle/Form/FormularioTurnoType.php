<?php

namespace FrontendBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;

use BackendBundle\Entity\Turno;

class FormularioTurnoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->setMethod('POST')
            ->add('nombre',null,array('label'=>'Nombre', 'attr'=>['class'=>'col-md-12']))
            ->add('apellido',null,array('label'=>'Apellido','attr'=>['class'=>'col-md-12']))
            ->add('direccion',null,array( 'label' => 'Dirección','attr'=>['class'=>'col-md-12']))
            ->add('correo',EmailType::class, [
                'attr'=>['class'=>'col-md-12'],
                'label' => 'Correo'
            ])
            ->add('telefono',null,array('label' => 'Teléfono','attr'=>['class'=>'col-md-12','type'=>'number']))
            ->add('diayhorapiso', null, array('label' => 'Día y Fecha Piso'))
            ->add('diayhoratecho', null, array('label' => 'Dia y Hora Piso'))
            ->add('enviar', SubmitType::class, array(
                'label' => 'Enviar','attr'=>['class'=>'btn-success'],
            ))
            //  ->add('limpiar', ResetType::class, array(
            //     'label' => 'Limpiar'
            // )
            //  );
        ;
    }
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Turno::class
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'frontendbundle_formulariocontacto';
    }


}
