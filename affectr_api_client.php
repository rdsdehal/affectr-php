<?php
  require_once 'affectr.php';
  require_once 'texts.php';
  require_once 'unirest-php/lib/Unirest.php';

  if (is_null($argv[1])) { exit("No API username provided."); }
  if (is_null($argv[2])) { exit("No API password provided."); }

  define("USR", $argv[1]);
  define("PWD", $argv[2]);

  define("BASE_URL", "http://api.theysay.io/v1");
  define("ENDPOINT_ADVERTISEMENT", BASE_URL . "/ad");
  define("ENDPOINT_CHUNK_PARSE", BASE_URL . "/chunkparse");
  define("ENDPOINT_COMPARISON", BASE_URL . "/comparison");
  define("ENDPOINT_DEP_PARSE", BASE_URL . "/depparse");
  define("ENDPOINT_EMOTION", BASE_URL . "/emotion");
  define("ENDPOINT_GENDER", BASE_URL . "/gender");
  define("ENDPOINT_HUMOUR", BASE_URL . "/humour");
  define("ENDPOINT_INTENT", BASE_URL . "/intent");
  define("ENDPOINT_NAMED_ENTITIES", BASE_URL . "/namedentity");
  define("ENDPOINT_POS_TAG", BASE_URL . "/postag");
  define("ENDPOINT_RISK", BASE_URL . "/risk");
  define("ENDPOINT_SENTIMENT", BASE_URL . "/sentiment");
  define("ENDPOINT_SPECULATION", BASE_URL . "/speculation");

  function call($url, $payload) {
    return Unirest::post(
      $url,
      array("Accept" => "application/json", "Content-Type" => "application/json"),
      json_encode($payload),
      USR,
      PWD
    );
  }

  function callAdvertisement($text) {
    $response = call(ENDPOINT_ADVERTISEMENT, array("text" => $text));
    outputAdvertisement($response->body, $text);
  }

  function callChunkParse($text) {
    $response = call(ENDPOINT_CHUNK_PARSE, array("text" => $text));
    outputChunkParse($response->body, $text);
  }

  function callDepParse($text) {
    $response = call(ENDPOINT_DEP_PARSE, array("text" => $text));
    outputDepParse($response->body, $text);
  }

  function callEmotionDocument($text) {
    $response = call(ENDPOINT_EMOTION, array("text" => $text));
    outputEmotionDocument($response->body, $text);
  }

  function callEmotionSentence($text) {
    $response = call(ENDPOINT_EMOTION, array("level" => "sentence", "text" => $text));
    outputEmotionSentence($response->body, $text);
  }

  function callGender($text) {
    $response = call(ENDPOINT_GENDER, array("text" => $text));
    outputGender($response->body, $text);
  }

  function callHumourDocument($text) {
    $response = call(ENDPOINT_HUMOUR, array("text" => $text));
    outputHumourDocument($response->body, $text);
  }

  function callHumourSentence($text) {
    $response = call(ENDPOINT_HUMOUR, array("level" => "sentence", "text" => $text));
    outputHumourSentence($response->body, $text);
  }

  function callIntent($text) {
    $response = call(ENDPOINT_INTENT, array("text" => $text));
    outputIntent($response->body, $text);
  }

  function callNamedEntities($text) {
    $response = call(ENDPOINT_NAMED_ENTITIES, array("text" => $text));
    outputNamedEntities($response->body, $text);
  }

  function callPosTag($text) {
    $response = call(ENDPOINT_POS_TAG, array("text" => $text));
    outputPosTag($response->body, $text);
  }

  function callRisk($text) {
    $response = call(ENDPOINT_RISK, array("text" => $text));
    outputRisk($response->body, $text);
  }

  function callSentimentDocument($text) {
    $response = call(ENDPOINT_SENTIMENT, array("text" => $text));
    outputSentimentDocument($response->body, $text);
  }

  function callSentimentEntity($text) {
    $response = call(ENDPOINT_SENTIMENT, array("level" => "entity", "text" => $text));
    outputSentimentEntity($response->body, $text);
  }

  function callSentimentEntityRelation($text) {
    $response = call(ENDPOINT_SENTIMENT, array("level" => "entityrelations", "text" => $text));
  }

  function callSentimentSentence($text) {
    $response = call(ENDPOINT_SENTIMENT, array("level" => "sentence", "text" => $text));
    outputSentimentSentence($response->body, $text);
  }

  function callSpeculation($text) {
    $response = call(ENDPOINT_SPECULATION, array("text" => $text));
    outputSpeculation($response->body, $text);
  }

  callAdvertisement($text13);
  callChunkParse($text1);
  callDepParse($text1);
  callEmotionDocument($text10);
  callEmotionSentence($text10);
  callGender($text12);
  callHumourDocument($text11);
  callHumourSentence($text11);
  callIntent($text3);
  callNamedEntities($text4);
  callPosTag($text1);
  callRisk($text5);
  callSentimentDocument($text8);
  callSentimentEntity($text7);
  callSentimentEntityRelation($text9);
  callSentimentSentence($text6);
  callSpeculation($text2);

  echo "\n", "Finished."
?>
