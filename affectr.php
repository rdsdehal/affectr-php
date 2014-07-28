<?php
  require_once 'vendor/underscore/underscore.php/underscore.php';

  function outputAdvertisement($analysis, $text) {
    echo "**** Advertisement detection ****\n";

    $print = join("\t", array(
      $analysis->score->label,
      $analysis->score->confidence
    ));

    echo preg_replace("/\n/", " ", $text), "\n", $print, "\n\n";
  }

  function outputChunkParse($analysis, $text) {
    echo "**** Chunk parsing ****\n";

    $print = join("\n", __::map($analysis, function($c) {
        return join("\t", array(
          $c->head->wordIndex,
          $c->chunk->chunkType,
          $c->head->text,
          $c->chunk->text
        ));
      })
    );

    echo $text, "\n", $print, "\n\n";
  }

  function outputDepParse($analysis, $text) {
    echo "**** Dependency parsing ****\n";

    $print = join("\n", __::map($analysis, function($w) {
      $gov = "";

      if (is_null($w->governor)) { $gov = "root"; }
      else { $gov = $w->governor->text . "-" . $w->governor->wordIndex; }

        return join("\t", array(
          $w->dependent->wordIndex,
          $w->dependency->relation . "(" . $gov . ", "  . $w->dependent->text . "-" . $w->dependent->wordIndex . ")"
        ));
      })
    );

    echo $text, "\n", $print, "\n\n";
  }

  function outputGender($analysis, $text) {
    echo "**** Gender detection ****\n";

    $print = join("\t", array(
      $analysis->score->label,
      $analysis->score->confidence
    ));

    echo preg_replace("/\n/", " ", $text), "\n", $print, "\n\n";
  }

  function outputEmotionDocument($analysis, $text) {
    echo "**** Emotion analysis (document) ****\n";

    $print = join("\n", __::map($analysis->emotions, function($e) {
        return join("\t", array(
          $e->dimension,
          $e->score
        ));
      })
    );

    echo preg_replace("/\n/", " ", $text), "\n", $print, "\n\n";
  }

  function outputEmotionSentence($analysis, $text) {
    echo "**** Emotion analysis (sentences) ****\n";

    $print = join("\n", __::map($analysis, function($s) {
        return join("\t", array(
          $s->sentenceIndex,

          join(" ", __::map($s->emotions, function($e) {
              return join(" ", array(
                $e->dimension,
                $e->score
              ));
            })
          ),

          $s->text
        ));
      })
    );

    echo $print, "\n\n";
  }

  function outputHumourDocument($analysis, $text) {
    echo "**** Humour detection (document)  ****\n";

    $print = join("\t", array(
      $analysis->score->label,
      $analysis->score->confidence
    ));

    echo preg_replace("/\n/", " ", $text), "\n", $print, "\n\n";
  }

  function outputHumourSentence($analysis, $text) {
    echo "**** Humour detection (sentences) ****\n";

    $print = join("\n", __::map($analysis, function($s) {
        return join("\t", array(
          $s->sentenceIndex,
          $s->score->label,
          $s->score->confidence,
          $s->text
        ));
      })
    );

    echo $print, "\n\n";
  }

  function outputIntent($analysis, $text) {
    echo "**** Intent analysis ****\n";

    $print = join("\n", __::map($analysis, function($s) {
        return join("\t", array(
          $s->sentenceIndex,
          $s->intentType,
          $s->text
        ));
      })
    );

    echo $text, "\n", $print, "\n\n";
  }

  function outputNamedEntities($analysis, $text) {
    echo "**** Named Entity recognition ****\n";

    $print = join("\n", __::map($analysis, function($e) {
        return join("\t", array(
          $e->headIndex,
          join("|", $e->namedEntityTypes),
          $e->head,
          $e->text
        ));
      })
    );

    echo preg_replace("/\n/", " ", $text), "\n", $print, "\n\n";
  }

  function outputPosTag($analysis, $text) {
    echo "**** Part-of-speech tagging ****\n";

    $print = join("\n", __::map($analysis, function($w) {
        return join("\t", array(
          $w->wordIndex,
          $w->text,
          $w->posTag
        ));
      })
    );

    echo $print, "\n";
  }

  function outputRisk($analysis, $text) {
    echo "**** Risk detection ****\n";

    $print = join("\n", __::map($analysis, function($s) {
        return join("\t", array(
          $s->sentenceIndex,
          $s->riskType,
          $s->text
        ));
      })
    );

    echo $text, "\n", $print, "\n\n";
  }

  function outputSentimentDocument($analysis, $text) {
    echo "**** Sentiment classification (document) ****\n";

    $print = join("\t", array(
      $analysis->wordCount . " words",
      $analysis->sentiment->positive . " (pos)",
      $analysis->sentiment->neutral . " (ntr)",
      $analysis->sentiment->negative . " (neg)"
    ));

    echo preg_replace("/\n/", " ", $text), "\n", $print, "\n\n";
  }

  function outputSentimentEntity($analysis, $text) {
    echo "**** Sentiment classification (entity mentions) ****\n";

    $print = join("\n", __::map($analysis, function($e) {
        return join("\t", array(
          $e->headNounIndex,
          $e->headNoun,
          $e->text,
          $e->sentiment->label,
          $e->sentiment->positive . " (pos)",
          $e->sentiment->neutral . " (ntr)",
          $e->sentiment->negative . " (neg)"
        ));
      })
    );

    echo preg_replace("/\n/", " ", $text), "\n", $print, "\n\n";
  }

  function outputSentimentSentence($analysis, $text) {
    echo "**** Sentiment classification (sentences) ****\n";

    $print = join("\n", __::map($analysis, function($s) {
        return join("\t", array(
          $s->sentenceIndex,
          $s->sentiment->positive . " (pos)",
          $s->sentiment->neutral . " (ntr)",
          $s->sentiment->negative . " (neg)",
          $s->text
        ));
      })
    );

    echo $print, "\n\n";
  }

  function outputSpeculation($analysis, $text) {
    echo "**** Speculation detection ****\n";

    $print = join("\n", __::map($analysis, function($s) {
        return join("\t", array(
          $s->sentenceIndex,
          $s->speculationType,
          $s->text
        ));
      })
    );

    echo $text, "\n", $print, "\n\n";
  }
?>
