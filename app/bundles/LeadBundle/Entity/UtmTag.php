<?php
/**
 * @package     Mautic
 * @copyright   2014 Mautic Contributors. All rights reserved.
 * @author      Mautic
 * @link        http://mautic.org
 * @license     GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

namespace Mautic\LeadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Mautic\ApiBundle\Serializer\Driver\ApiMetadataDriver;
use Mautic\CoreBundle\Doctrine\Mapping\ClassMetadataBuilder;
use Mautic\CoreBundle\Entity\FormEntity;
use Symfony\Component\Validator\Constraints as Assert;


class UtmTag
{

    /**
     * @var int
     */
    private $id;

    /**
     * @var \Mautic\LeadBundle\Entity\Lead
     */
    private $lead;

    /**
     * @var array
     */
    private $query = array();

    /**
     * @var string
     */
    private $referrer;

    /**
     * @var string
     */
    private $remoteHost;

    /**
     * @var
     */
    private $url;

    /**
     * @var string
     */
    private $userAgent;

    /**
     * @var string
     */
    private $utmCampaign;

    /**
     * @var string
     */
    private $utmContent;

    /**
     * @var string
     */
    private $utmMedium;

    /**
     * @var string
     */
    private $utmSource;

    /**
     * @var string
     */
    private $utmTerm;

    /**
     * @param ORM\ClassMetadata $metadata
     */
    public static function loadMetadata (ORM\ClassMetadata $metadata)
    {
        $builder = new ClassMetadataBuilder($metadata);

        $builder->setTable('lead_utmtags')
            ->setCustomRepositoryClass('Mautic\LeadBundle\Entity\UtmTagRepository')
            ->addIndex(array('utmtag'), 'lead_utmtag_search');
        
        $builder->addId();

        $builder->addLead(false, 'CASCADE', false, 'utmTags');

        $builder->addNullableField('query', 'array');

        $builder->addField('referrer', 'string');

        $builder->createField('remoteHost', 'string')
            ->columnName('remote_host')
            ->build();

        $builder->addField('url', 'string');

        $builder->createField('userAgent', 'string')
            ->columnName('user_agent')
            ->build();

        $builder->createField('utmCampaign', 'string')
            ->columnName('utm_campaign')
            ->build();

        $builder->createField('utmContent', 'string')
            ->columnName('utm_content')
            ->build();

        $builder->createField('utmMedium', 'string')
            ->columnName('utm_medium')
            ->build();

        $builder->createField('utmSource', 'string')
            ->columnName('utm_source')
            ->build();

        $builder->createField('utmTerm', 'string')
            ->columnName('utm_term')
            ->build();
    }

    /**
     * Prepares the metadata for API usage
     *
     * @param $metadata
     */
    public static function loadApiMetadata(ApiMetadataDriver $metadata)
    {
        $metadata->setGroupPrefix('tmutmtag')
            ->addListProperties(
                array(
                    'id',
                    'lead',
                    'query',
                    'referrer',
                    'remoteHost',
                    'url',
                    'userAgent',
                    'utmCampaign',
                    'utmContent',
                    'utmMedium',
                    'utmSource',
                    'utmTerm'
                )
            )
            ->build();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId ()
    {
        return $this->id;
    }

    /**
     * @return Lead
     */
    public function getLead()
    {
        return $this->lead;
    }

    /**
     * @param Lead $lead
     *
     * @return Hit
     */
    public function setLead(Lead $lead)
    {
        $this->lead = $lead;

        return $this;
    }

    /**
     * @return array
     */
    public function getQuery()
    {
        return $this->query;
    }

    /**
     * @param array $query
     *
     * @return Hit
     */
    public function setQuery($query)
    {
        $this->query = $query;

        return $this;
    }

    /**
     * Set referrer
     *
     * @param string $referrer
     *
     * @return Action
     */
    public function setReferrer ($referrer)
    {
        $this->referrer = $referrer;

        return $this;
    }

    /**
     * Get referrer
     *
     * @return string
     */
    public function getReferrer ()
    {
        return $this->referrer;
    }

    /**
     * Set remoteHost
     *
     * @param string $remoteHost
     *
     * @return Hit
     */
    public function setRemoteHost($remoteHost)
    {
        $this->remoteHost = $remoteHost;

        return $this;
    }

    /**
     * Get remoteHost
     *
     * @return string
     */
    public function getRemoteHost()
    {
        return $this->remoteHost;
    }

    /**
     * Set url
     *
     * @param string $url
     *
     * @return Hit
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set userAgent
     *
     * @param string $userAgent
     *
     * @return Hit
     */
    public function setUserAgent($userAgent)
    {
        $this->userAgent = $userAgent;

        return $this;
    }

    /**
     * Get userAgent
     *
     * @return string
     */
    public function getUserAgent()
    {
        return $this->userAgent;
    }

     /**
     * @return array
     */
    public function getUtmCampaign()
    {
        return $this->utmCampaign;
    }

    /**
     * @param array $query
     *
     * @return Hit
     */
    public function setUtmCampaign($utmCampaign)
    {
        $this->utmCampaign = $utmCampaign;

        return $this;
    }

    /**
     * @return array
     */
    public function getUtmContent()
    {
        return $this->utmContent;
    }

    /**
     * @param array $query
     *
     * @return Hit
     */
    public function setUtmConent($utmContent)
    {
        $this->utmContent = $utmContent;

        return $this;
    }

    /**
     * @return array
     */
    public function getUtmMedium()
    {
        return $this->utmMedium;
    }

    /**
     * @param array $query
     *
     * @return Hit
     */
    public function setUtmMedium($utmMedium)
    {
        $this->utmMedium = $utmMedium;

        return $this;
    }

    /**
     * @return array
     */
    public function getUtmSource()
    {
        return $this->utmSource;
    }

    /**
     * @param array $query
     *
     * @return Hit
     */
    public function setUtmSource($utmSource)
    {
        $this->utmSource = $utmSource;

        return $this;
    }

    /**
     * @return array
     */
    public function getUtmTerm()
    {
        return $this->utmTerm;
    }

    /**
     * @param array $query
     *
     * @return Hit
     */
    public function setUtmTerm($utmTerm)
    {
        $this->utmTerm = $utmTerm;

        return $this;
    }

}
