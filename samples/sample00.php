<?php
  include_once '../PHPeSpeak/PHPeSpeak.php';

  $oPHPeSpeak = new PHPeSpeak();
  $oPHPeSpeak->setPath('C:\Program Files (x86)\eSpeak\command_line\espeak.exe');

  $oPHPeSpeak->setLanguage('french');
  $oPHPeSpeak->setVoice('m3');
  $oPHPeSpeak->setAmplitude(150);
  $oPHPeSpeak->setPitch(50);
  $oPHPeSpeak->setSpeed(150);
  $oPHPeSpeak->talk('Bonjour, je suis Progi1984');
  $oPHPeSpeak->enableWhisper();
  $oPHPeSpeak->talk('Bonjour, je chuchote.');

  $oPHPeSpeak->init();
  $oPHPeSpeak->setLanguage('french');
  $oPHPeSpeak->setVoice('m2');
  $oPHPeSpeak->setAmplitude(150);
  $oPHPeSpeak->setPitch(50);
  $oPHPeSpeak->setSpeed(150);
  $oPHPeSpeak->exportWAV('Bienvenue sur ce projet.', 'file.wav');