<?php

namespace ArgentCrusade\Selectel\CloudStorage\Contracts;

interface ContainerContract
{
    /**
     * Container name.
     *
     * @return string
     */
    public function name();

    /**
     * Container visibility type.
     *
     * @return string
     */
    public function type();

    /**
     * Container files count.
     *
     * @return int
     */
    public function filesCount();

    /**
     * Container size in bytes.
     *
     * @return int
     */
    public function size();

    /**
     * Total uploaded (received) bytes.
     *
     * @return int
     */
    public function uploadedBytes();

    /**
     * Total downloaded (transmitted) bytes.
     *
     * @return int
     */
    public function downloadedBytes();

    /**
     * Determines if container is public.
     *
     * @return bool
     */
    public function isPublic();

    /**
     * Determines if container is private.
     *
     * @return bool
     */
    public function isPrivate();

    /**
     * Determines if container is a gallery container.
     *
     * @return bool
     */
    public function isGallery();

    /**
     * Sets container type to 'public'.
     *
     * @throws \ArgentCrusade\Selectel\CloudStorage\Exceptions\ApiRequestFailedException
     *
     * @return string
     */
    public function setPublic();

    /**
     * Sets container type to 'private'.
     *
     * @throws \ArgentCrusade\Selectel\CloudStorage\Exceptions\ApiRequestFailedException
     *
     * @return string
     */
    public function setPrivate();

    /**
     * Sets container type to 'gallery'.
     *
     * @throws \ArgentCrusade\Selectel\CloudStorage\Exceptions\ApiRequestFailedException
     *
     * @return string
     */
    public function setGallery();

    /**
     * Creates new Fluent files loader instance.
     *
     * @return \ArgentCrusade\Selectel\CloudStorage\Contracts\FluentFilesLoaderContract
     */
    public function files();

    /**
     * Determines whether file exists or not.
     *
     * @param string $path File path.
     *
     * @return bool
     */
    public function fileExists($path);

    /**
     * Retrieves file object container. This method does not actually download file, see File::download.
     *
     * @param string $path
     *
     * @throws \ArgentCrusade\Selectel\CloudStorage\Exceptions\FileNotFoundException
     *
     * @return \ArgentCrusade\Selectel\CloudStorage\Contracts\FileContract
     */
    public function getFile($path);

    /**
     * Transforms file array to instance of File object.
     *
     * @param array $file File array.
     *
     * @return \ArgentCrusade\Selectel\CloudStorage\Contracts\FileContract
     */
    public function getFileFromArray(array $file);

    /**
     * Creates new directory.
     *
     * @param string $name Directory name.
     *
     * @throws \ArgentCrusade\Selectel\CloudStorage\Exceptions\ApiRequestFailedException
     *
     * @return string
     */
    public function createDir($name);

    /**
     * Deletes directory.
     *
     * @param string $name Directory name.
     */
    public function deleteDir($name);

    /**
     * Uploads file contents from string. Returns ETag header value if upload was successful.
     *
     * @param string $path           Remote path.
     * @param string $contents
     * @param array  $params         = []
     * @param bool   $verifyChecksum = true
     *
     * @throws \ArgentCrusade\Selectel\CloudStorage\Exceptions\UploadFailedException
     *
     * @return string
     */
    public function uploadFromString($path, $contents, array $params = [], $verifyChecksum = true);

    /**
     * Uploads file from stream. Returns ETag header value if upload was successful.
     *
     * @param string   $path     Remote path.
     * @param resource $resource Stream resource.
     * @param array    $params   = [] Upload params.
     *
     * @throws \ArgentCrusade\Selectel\CloudStorage\Exceptions\UploadFailedException
     *
     * @return string
     */
    public function uploadFromStream($path, $resource, array $params = []);

    /**
     * Deletes container. Container must be empty in order to perform this operation.
     */
    public function delete();
}
