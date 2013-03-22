<?php


class PHPeSpeak {
  protected $_path;
  protected $_sLang = null;
  protected $_sVoice = null;
  protected $_iAmplitude = null;
  protected $_iPitch = null;
  protected $_iSpeed = null;
  protected $_iWordGap = null;
  protected $_bWhisper = null;

  public function init(){
    $this->_sLang = null;
    $this->_sVoice = null;
    $this->_iAmplitude = null;
    $this->_iPitch = null;
    $this->_iSpeed = null;
    $this->_iWordGap = null;
    $this->_bWhisper = null;
  }
  public function setPath($psPath){
    if(file_exists($psPath)){
      $this->_path = $psPath;
      return true;
    }
    return false;
  }
  public function setLanguage($psLang){
    $this->_sLang = $psLang;
  }
  public function setVoice($psVoice){
    $this->_sVoice = $psVoice;
  }
  public function setAmplitude($piValue){
    if(is_int($piValue)){
      if($piValue >= 0 && $piValue <= 200){
        $this->_iAmplitude = $piValue;
        return true;
      }
    }
    return false;
  }
  public function setPitch($piValue){
    if(is_int($piValue)){
      if($piValue >= 0 && $piValue <= 99){
        $this->_iPitch = $piValue;
        return true;
      }
    }
    return false;
  }
  public function setSpeed($piValue){
    if(is_int($piValue)){
      if($piValue >= 80 && $piValue <= 450){
        $this->_iSpeed = $piValue;
        return true;
      }
    }
    return false;
  }
  public function setWordGap($piValue){
    if(is_int($piValue)){
      $this->_iWordGap = $piValue;
      return true;
    }
    return false;
  }
  public function enableWhisper(){
    $this->_bWhisper = true;
  }
  public function disableWhisper(){
    $this->_bWhisper = false;
  }

  public function talk($psPhrase){
    $psExec = '"'.$this->_path.'"'.' ';
    // Amplitude
    if(!is_null($this->_iAmplitude)){
      $psExec .= '-a '.$this->_iAmplitude.' ';
    }
    // Word Gap
    if(!is_null($this->_iWordGap)){
      $psExec .= '-g '.$this->_iWordGap.' ';
    }
    // Pitch
    if(!is_null($this->_iPitch)){
      $psExec .= '-p '.$this->_iPitch.' ';
    }
    // Speed
    if(!is_null($this->_iSpeed)){
      $psExec .= '-s '.$this->_iSpeed.' ';
    }
    // Voice name
    if(!is_null($this->_sLang)){
      $psExec .= '-v '.$this->_sLang;
      if(!is_null($this->_bWhisper) && $this->_bWhisper == true){
        $psExec .= '+whisper';
      } else {
        if(!is_null($this->_sVoice)){
          $psExec .= '+'.$this->_sVoice;
        }
      }
      $psExec .= ' ';
    }
    $psExec .= '"'.$psPhrase.'"';
    echo $psExec.'<br />';
    echo exec($psExec);
  }

  public function exportWAV($psPhrase, $psFile){
    $psExec = '"'.$this->_path.'"'.' ';
    // Amplitude
    if(!is_null($this->_iAmplitude)){
      $psExec .= '-a '.$this->_iAmplitude.' ';
    }
    // Word Gap
    if(!is_null($this->_iWordGap)){
      $psExec .= '-g '.$this->_iWordGap.' ';
    }
    // Pitch
    if(!is_null($this->_iPitch)){
      $psExec .= '-p '.$this->_iPitch.' ';
    }
    // Speed
    if(!is_null($this->_iSpeed)){
      $psExec .= '-s '.$this->_iSpeed.' ';
    }
    // Voice name
    if(!is_null($this->_sLang)){
      $psExec .= '-v "'.$this->_sLang.'"';
      if(!is_null($this->_bWhisper) && $this->_bWhisper == true){
        $psExec .= '+whisper';
      } else {
        if(!is_null($this->_sVoice)){
          $psExec .= '+'.$this->_sVoice;
        }
      }
      $psExec .= ' ';
    }
    $psExec .= '-w "'.$psFile.'" ';
    $psExec .= '"'.$psPhrase.'"';
    echo $psExec.'<br />';
    echo exec($psExec);
  }
}