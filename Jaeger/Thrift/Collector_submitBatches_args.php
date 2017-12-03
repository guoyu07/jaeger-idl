<?php
namespace Jaeger\Thrift;
/**
 * Autogenerated by Thrift Compiler (0.10.0)
 *
 * DO NOT EDIT UNLESS YOU ARE SURE THAT YOU KNOW WHAT YOU ARE DOING
 *  @generated
 */
use Thrift\Base\TBase;
use Thrift\Type\TType;
use Thrift\Type\TMessageType;
use Thrift\Exception\TException;
use Thrift\Exception\TProtocolException;
use Thrift\Protocol\TProtocol;
use Thrift\Protocol\TBinaryProtocolAccelerated;
use Thrift\Exception\TApplicationException;


class Collector_submitBatches_args {
  static $_TSPEC;

  /**
   * @var \Jaeger\Thrift\Batch[]
   */
  public $batches = null;

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        1 => array(
          'var' => 'batches',
          'type' => TType::LST,
          'etype' => TType::STRUCT,
          'elem' => array(
            'type' => TType::STRUCT,
            'class' => '\Jaeger\Thrift\Batch',
            ),
          ),
        );
    }
    if (is_array($vals)) {
      if (isset($vals['batches'])) {
        $this->batches = $vals['batches'];
      }
    }
  }

  public function getName() {
    return 'Collector_submitBatches_args';
  }

  public function read($input)
  {
    $xfer = 0;
    $fname = null;
    $ftype = 0;
    $fid = 0;
    $xfer += $input->readStructBegin($fname);
    while (true)
    {
      $xfer += $input->readFieldBegin($fname, $ftype, $fid);
      if ($ftype == TType::STOP) {
        break;
      }
      switch ($fid)
      {
        case 1:
          if ($ftype == TType::LST) {
            $this->batches = array();
            $_size42 = 0;
            $_etype45 = 0;
            $xfer += $input->readListBegin($_etype45, $_size42);
            for ($_i46 = 0; $_i46 < $_size42; ++$_i46)
            {
              $elem47 = null;
              $elem47 = new \Jaeger\Thrift\Batch();
              $xfer += $elem47->read($input);
              $this->batches []= $elem47;
            }
            $xfer += $input->readListEnd();
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        default:
          $xfer += $input->skip($ftype);
          break;
      }
      $xfer += $input->readFieldEnd();
    }
    $xfer += $input->readStructEnd();
    return $xfer;
  }

  public function write($output) {
    $xfer = 0;
    $xfer += $output->writeStructBegin('Collector_submitBatches_args');
    if ($this->batches !== null) {
      if (!is_array($this->batches)) {
        throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
      }
      $xfer += $output->writeFieldBegin('batches', TType::LST, 1);
      {
        $output->writeListBegin(TType::STRUCT, count($this->batches));
        {
          foreach ($this->batches as $iter48)
          {
            $xfer += $iter48->write($output);
          }
        }
        $output->writeListEnd();
      }
      $xfer += $output->writeFieldEnd();
    }
    $xfer += $output->writeFieldStop();
    $xfer += $output->writeStructEnd();
    return $xfer;
  }

}

