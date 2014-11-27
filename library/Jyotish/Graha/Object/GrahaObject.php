<?php
/**
 * @link      http://github.com/kunjara/jyotish for the canonical source repository
 * @license   GNU General Public License version 2 or later
 */

namespace Jyotish\Graha\Object;

use Jyotish\Base\Object;
use Jyotish\Graha\Graha;
use Jyotish\Rashi\Rashi;
use Jyotish\Bhava\Bhava;
use Jyotish\Ganita\Math;
use Jyotish\Varga\Varga;
use Jyotish\Tattva\Jiva\Nara\Deva;

/**
 * Parent class for graha objects.
 *
 * @author Kunjara Lila das <vladya108@gmail.com>
 */
class GrahaObject extends Object {
    /**
     * Options of graha object.
     * 
     * @var array
     */
    protected $options = array(
        'relationSame' => false,
        'relationChaya' => '',
        'specificRashi' => '',
        'drishtiRahu' => '',
    );
    
    /**
     * Object type
     * 
     * @var string
     */
    protected $objectType = 'graha';

    /**
     * Unicode of the Graha.
     * 
     * @var string
     */
    protected $grahaUnicode;

    /**
     * Amsha of the Graha.
     * 
     * @var string
     * @see Maharishi Parashara. Brihat Parashara Hora Shastra. Chapter 2, Verse 2.
     */
    protected $grahaAmsha;


    /**
     * Avatara of the Graha.
     * 
     * @var string
     * @see Maharishi Parashara. Brihat Parashara Hora Shastra. Chapter 2, Verse 5-7.
     */
    protected $grahaAvatara;

    /**
     * Devanagari graha title in transliteration.
     * 
     * @var array
     * @see Maharishi Parashara. Brihat Parashara Hora Shastra. Chapter 3, Verse 10.
     * @see Jyotish\Alphabet\Devanagari
     */
    protected $grahaTranslit;

    /**
     * Character of the Graha.
     * 
     * @var string
     * @see Maharishi Parashara. Brihat Parashara Hora Shastra. Chapter 3, Verse 11.
     * @see Varahamihira. Brihat Jataka. Chapter 2, Verse 5.
     */
    protected $grahaCharacter;

    /**
     * Deva of the Graha.
     * 
     * @var string
     * @see Maharishi Parashara. Brihat Parashara Hora Shastra. Chapter 3, Verse 18.
     * @see Varahamihira. Brihat Jataka. Chapter 2, Verse 5.
     */
    protected $grahaDeva;

    /**
     * Gender of the Graha.
     * 
     * @var string
     * @see Maharishi Parashara. Brihat Parashara Hora Shastra. Chapter 3, Verse 19.
     * @see Varahamihira. Brihat Jataka. Chapter 2, Verse 6.
     */
    protected $grahaGender;

    /**
     * Bhuta of the Graha.
     * 
     * @var string
     * @see Maharishi Parashara. Brihat Parashara Hora Shastra. Chapter 3, Verse 20.
     * @see Varahamihira. Brihat Jataka. Chapter 2, Verse 6.
     */
    protected $grahaBhuta;

    /**
     * Varna of the Graha.
     * 
     * @var string
     * @see Maharishi Parashara. Brihat Parashara Hora Shastra. Chapter 3, Verse 21.
     * @see Varahamihira. Brihat Jataka. Chapter 2, Verse 7.
     */
    protected $grahaVarna;

    /**
     * Guna of the Graha.
     * 
     * @var string
     * @see Maharishi Parashara. Brihat Parashara Hora Shastra. Chapter 3, Verse 22.
     * @see Varahamihira. Brihat Jataka. Chapter 2, Verse 7.
     */
    protected $grahaGuna;

    /**
     * Dhatu of the Graha.
     * 
     * @var string
     * @see Maharishi Parashara. Brihat Parashara Hora Shastra. Chapter 3, Verse 31.
     * @see Varahamihira. Brihat Jataka. Chapter 2, Verse 11.
     */
    protected $grahaDhatu;

    /**
     * Kala of the Graha.
     * 
     * @var string
     * @see Maharishi Parashara. Brihat Parashara Hora Shastra. Chapter 3, Verse 33.
     */
    protected $grahaKala;

    /**
     * Rasa of the Graha.
     * 
     * @var string
     * @see Maharishi Parashara. Brihat Parashara Hora Shastra. Chapter 3, Verse 34.
     * @see Varahamihira. Brihat Jataka. Chapter 2, Verse 14.
     */
    protected $grahaRasa;

    /**
     * Ritu of the Graha.
     * 
     * @var string
     * @see Maharishi Parashara. Brihat Parashara Hora Shastra. Chapter 3, Verse 45-46.
     * @see Varahamihira. Brihat Jataka. Chapter 2, Verse 12.
     */
    protected $grahaRitu;
    /**
     * Graha basis.
     * 
     * @var string
     * @see Maharishi Parashara. Brihat Parashara Hora Shastra. Chapter 3, Verse 47.
     */
    protected $grahaBasis;

    /**
     * Graha exaltation.
     * 
     * @var array
     * @see Maharishi Parashara. Brihat Parashara Hora Shastra. Chapter 3, Verse 49-50.
     * @see Varahamihira. Brihat Jataka. Chapter 1, Verse 13.
     */
    protected $grahaUcha = array();

    /**
     * Graha debilitation.
     * 
     * @var array
     * @see Maharishi Parashara. Brihat Parashara Hora Shastra. Chapter 3, Verse 49-50.
     * @see Varahamihira. Brihat Jataka. Chapter 1, Verse 13.
     */
    protected $grahaNeecha = array();

    /**
     * Graha mooltrikon.
     * 
     * @var array
     * @see Maharishi Parashara. Brihat Parashara Hora Shastra. Chapter 3, Verse 51-54.
     * @see Varahamihira. Brihat Jataka. Chapter 1, Verse 14.
     */
    protected $grahaMool = array();

    /**
     * Own sign of the graha.
     * 
     * @var array
     * @see Maharishi Parashara. Brihat Parashara Hora Shastra. Chapter 3, Verse 51-54.
     */
    protected $grahaSwa = array();

    /**
     * Natural relationships.
     * 
     * @var array
     * @see Maharishi Parashara. Brihat Parashara Hora Shastra. Chapter 3, Verse 55.
     */
    protected $grahaNaturalRelation = array();

    /**
     * Graha disha
     * 
     * @var string
     * @see Varahamihira. Brihat Jataka. Chapter 2, Verse 5.
     */
    protected $grahaDisha;

    /**
     * Graha drishti
     * 
     * @var array
     * @see Varahamihira. Brihat Jataka. Chapter 2, Verse 13.
     */
    protected $grahaDrishti = array();

    /**
     * Prakriti of graha
     * 
     * @var array
     */
    protected $grahaPrakriti;
    protected $grahaAgeMaturity;
    protected $grahaAgePeriod = array(
        'start',
        'end'
    );

    /**
     * Get bhava, where graha is positioned.
     * 
     * @return int
     */
    public function getBhava()
    {
        $this->checkEnvironment();

        $grahaRashi = $this->ganitaData['graha'][$this->objectKey]['rashi'];
        $bhava = 0;
        do{
            $bhava++;
            $bhavaRashi = $this->ganitaData['bhava'][$bhava]['rashi'];
        }
        while($grahaRashi <> $bhavaRashi);

        return $bhava;
    }

    /**
     * Get ruler of the bhava, where graha is positioned.
     * 
     * @return string
     */
    public function getDispositor()
    {
        $this->checkEnvironment();

        $bhava = $this->getBhava();
        $Bhava = Bhava::getInstance($bhava);
        $Bhava->setEnvironment($this->ganitaData);

        return $Bhava->getRuler();
    }
    
    /**
     * Whether the graha is vargottama.
     * 
     * @return boolean
     * @see Venkatesh Sharma. Sarvarth Chintamani. Chapter 1, Verse 50.
     */
    public function isVargottama()
    {
        $this->checkEnvironment();
        
        $d1Data = $this->ganitaData;
        
        $Varga9 = Varga::getInstance('D9');
        $d9Data = $Varga9->getVargaData($d1Data);
        
        if($d1Data['graha'][$this->objectKey]['rashi'] == $d9Data['graha'][$this->objectKey]['rashi'])
            return true;
        else
            return false;
    }

    /**
     * Set alternative graha names.
     */
    protected function setGrahaAltName()
    {
        if($this->objectKey != 'Ra' and $this->objectKey != 'Ke'){
            $grahaAltName = 'deva'.$this->objectName;
            $this->objectAltName = Deva::${$grahaAltName};
        }
    }

    /**
     * Set natural relationships.
     * 
     * @param null|array $options Options to set
     * @see Maharishi Parashara. Brihat Parashara Hora Shastra. Chapter 3, Verse 55.
     */
    protected function setGrahaNaturalRelation($options)
    {
        $relationships = array();
        $friendsFromMt = [2, 4, 5, 8, 9, 12];
        $enemiesFromMt = [3, 6, 7, 10, 11];

        $rashiMool = $this->grahaMool['rashi'];
        $rashiUcha = $this->grahaUcha['rashi'];

        $friends = array();
        $R = Rashi::getInstance($rashiUcha);
        $gFriend = $R->rashiRuler;
        if($this->objectKey != $gFriend) $friends[] = $gFriend;

        $relation = function($distance) use($rashiMool){
            foreach($distance as $step){
                $r = Math::numberInCycle($rashiMool, $step);
                $R = Rashi::getInstance((int)$r);
                $gRuler = $R->rashiRuler;

                if($this->objectKey == $gRuler) continue;
                $grahas[] = $gRuler;
            }
            return $grahas;
        };

        $friends = array_unique(array_merge($friends, $relation($friendsFromMt)));
        $enemies = array_unique($relation($enemiesFromMt));

        foreach (Graha::$graha as $key => $name){
            if($this->objectKey == $key) continue;

            if(in_array($key, $friends) and in_array($key, $enemies)){
                $relationships[$key] = 0;
            }elseif(in_array($key, $friends)){
                $relationships[$key] = 1;
            }elseif(in_array($key, $enemies)){
                $relationships[$key] = -1;
            }else{
                $G = Graha::getInstance($key, $options);
                $relationships[$key] = $G->grahaNaturalRelation[$this->objectKey];
            }
        }
        $relationships[$this->objectKey] = $options['relationSame'] ? 1 : null;

        $this->grahaNaturalRelation = $relationships;
    }

    /**
     * Set exaltation, sebilitation, mooltrikon and own.
     * 
     * @param array $specificRashi
     */
    protected function setGrahaSpecificRashi(array $specificRashi)
    {
        $this->grahaUcha = ['rashi' => $specificRashi['ucha']];
        $this->grahaMool = ['rashi' => $specificRashi['mool']];
        $this->grahaSwa = ['rashi' => $specificRashi['swa']];
        $this->grahaNeecha = ['rashi' => $specificRashi['neecha']];
    }

    /**
     * Constructor
     * 
     * @param null|array $options Options to set
     */
    public function __construct($options)
    {
        parent::__construct($options);
        
        $this->setGrahaAltName();
        $this->setGrahaNaturalRelation($this->options);
    }
}
