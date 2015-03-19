<?php

namespace BespokeSupport\DocumentStorageBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class DocumentStorageEntity
 * @package BespokeSupport\DocumentStorageBundle\Entity
 * @ORM\Table("document_storage_entity", indexes={
 *      @ORM\Index(name="entity_class_id", columns={"entity_class","entity_id"})
 * })
 * @ORM\Entity(repositoryClass="BespokeSupport\DocumentStorageBundle\Repository\DocumentStorageRepositoryEntity")
 */
class DocumentStorageEntity
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @var string
     * @ORM\Column(name="entity_class", type="string", length=255, nullable=false)
     */
    protected $entityClass;
    /**
     * @var string
     * @ORM\Column(name="entity_id", type="string", length=255, nullable=false)
     */
    protected $entityId;
    /**
     * @var DocumentStorageFile[]
     *
     * @ORM\ManyToMany(targetEntity="DocumentStorageFile", mappedBy="entities")
     **/
    protected $files;
    /**
     * @var DocumentStorageText[]
     *
     * @ORM\ManyToMany(targetEntity="DocumentStorageText", mappedBy="entities")
     **/
    protected $texts;

    function __construct($class = null, $id = null)
    {
        $this->files = new ArrayCollection();
        $this->texts = new ArrayCollection();

        if (is_string($class)) {
            $this->setEntityClass($class);
        }

        if ($id) {
            $this->setEntityId($id);
        }
    }

    /**
     * @return string
     */
    public function getEntityClass()
    {
        return $this->entityClass;
    }

    /**
     * @param string $entityClass
     */
    public function setEntityClass($entityClass)
    {
        $this->entityClass = $entityClass;
    }

    /**
     * @return string
     */
    public function getEntityId()
    {
        return $this->entityId;
    }

    /**
     * @param string $entityId
     */
    public function setEntityId($entityId)
    {
        $this->entityId = $entityId;
    }

    /**
     * @return DocumentStorageFile[]
     */
    public function getFiles()
    {
        return $this->files;
    }

    /**
     * @param DocumentStorageFile[] $files
     */
    public function setFiles($files)
    {
        $this->files = $files;
    }

    /**
     * @return DocumentStorageText[]
     */
    public function getTexts()
    {
        return $this->texts;
    }

    /**
     * @param DocumentStorageText[] $texts
     */
    public function setTexts($texts)
    {
        $this->texts = $texts;
    }




}
