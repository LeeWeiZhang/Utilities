<?php


namespace WeiZhang\Utilities;


class Requests
{
    public function getDownloadSize(array $urls): float
    {
        $mh = curl_multi_init();

        foreach($urls as $k => $url){
            $requests[$k] = array();
            $requests[$k]['url'] = $url;
            $requests[$k]['curl_handle'] = curl_init($url);
            curl_setopt($requests[$k]['curl_handle'], CURLOPT_RETURNTRANSFER, true);
            curl_setopt($requests[$k]['curl_handle'], CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($requests[$k]['curl_handle'], CURLOPT_TIMEOUT, 10);
            curl_setopt($requests[$k]['curl_handle'], CURLOPT_CONNECTTIMEOUT, 10);
            curl_setopt($requests[$k]['curl_handle'], CURLOPT_HEADER, TRUE);
            curl_setopt($requests[$k]['curl_handle'], CURLOPT_NOBODY, TRUE);
            curl_multi_add_handle($mh, $requests[$k]['curl_handle']);
        }

        $stillRunning = false;
        do {
            curl_multi_exec($mh, $stillRunning);
        } while ($stillRunning);

        $size = 0;
        foreach($requests as $k => $request){
            curl_multi_remove_handle($mh, $request['curl_handle']);
            $requests[$k]['content'] = curl_multi_getcontent($request['curl_handle']);
            $requests[$k]['http_code'] = curl_getinfo($request['curl_handle'], CURLINFO_HTTP_CODE);
            $size += curl_getinfo($request['curl_handle'], CURLINFO_CONTENT_LENGTH_DOWNLOAD);
            curl_close($requests[$k]['curl_handle']);
        }
        curl_multi_close($mh);

        return $size;
    }
}
