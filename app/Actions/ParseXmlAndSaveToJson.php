<?php

namespace App\Actions;

use SimpleXMLElement;

class ParseXmlAndSaveToJson
{
    public function run()
    {
        $xmlString = file_get_contents(public_path('/data/data.xml'));
        $xml = new SimpleXMLElement($xmlString);
        $arr = $this->xmlToArray($xml);
        file_put_contents(public_path('/data/data.json'), json_encode($arr, JSON_UNESCAPED_UNICODE));
    }

    // from php manual comments https://www.php.net/manual/en/class.simplexmlelement.php
    function xmlToArray(SimpleXMLElement $xml): array
    {
        $parser = function (SimpleXMLElement $xml, array $collection = []) use (&$parser) {
            $nodes = $xml->children();
            $attributes = $xml->attributes();

            if (0 !== count($attributes)) {
                foreach ($attributes as $attrName => $attrValue) {
                    $collection['attributes'][$attrName] = strval($attrValue);
                }
            }

            if (0 === $nodes->count()) {
                $collection['value'] = strval($xml);
                return $collection;
            }

            foreach ($nodes as $nodeName => $nodeValue) {
                if (count($nodeValue->xpath('../' . $nodeName)) < 2) {
                    $collection[$nodeName] = $parser($nodeValue);
                    continue;
                }

                $collection[$nodeName][] = $parser($nodeValue);
            }

            return $collection;
        };

        return [
            $xml->getName() => $parser($xml)
        ];
    }
}
