<?php
/*
 * Copyright 2021 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     https://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

/*
 * GENERATED CODE WARNING
 * Generated by gapic-generator-php from the file
 * https://github.com/googleapis/googleapis/blob/master/google/dataflow/v1beta3/metrics.proto
 * Updates to the above are reflected here through a refresh process.
 *
 * @experimental
 */

namespace Google\Cloud\Dataflow\V1beta3\Gapic;

use Google\ApiCore\ApiException;
use Google\ApiCore\CredentialsWrapper;

use Google\ApiCore\GapicClientTrait;
use Google\ApiCore\RequestParamsHeaderDescriptor;
use Google\ApiCore\RetrySettings;
use Google\ApiCore\Transport\TransportInterface;
use Google\ApiCore\ValidationException;
use Google\Auth\FetchAuthTokenInterface;
use Google\Cloud\Dataflow\V1beta3\GetJobExecutionDetailsRequest;
use Google\Cloud\Dataflow\V1beta3\GetJobMetricsRequest;
use Google\Cloud\Dataflow\V1beta3\GetStageExecutionDetailsRequest;
use Google\Cloud\Dataflow\V1beta3\JobExecutionDetails;
use Google\Cloud\Dataflow\V1beta3\JobMetrics;
use Google\Cloud\Dataflow\V1beta3\StageExecutionDetails;
use Google\Protobuf\Timestamp;

/**
 * Service Description: The Dataflow Metrics API lets you monitor the progress of Dataflow
 * jobs.
 *
 * This class provides the ability to make remote calls to the backing service through method
 * calls that map to API methods. Sample code to get started:
 *
 * ```
 * $metricsV1Beta3Client = new MetricsV1Beta3Client();
 * try {
 *     // Iterate over pages of elements
 *     $pagedResponse = $metricsV1Beta3Client->getJobExecutionDetails();
 *     foreach ($pagedResponse->iteratePages() as $page) {
 *         foreach ($page as $element) {
 *             // doSomethingWith($element);
 *         }
 *     }
 *     // Alternatively:
 *     // Iterate through all elements
 *     $pagedResponse = $metricsV1Beta3Client->getJobExecutionDetails();
 *     foreach ($pagedResponse->iterateAllElements() as $element) {
 *         // doSomethingWith($element);
 *     }
 * } finally {
 *     $metricsV1Beta3Client->close();
 * }
 * ```
 *
 * @experimental
 */
class MetricsV1Beta3GapicClient
{
    use GapicClientTrait;

    /**
     * The name of the service.
     */
    const SERVICE_NAME = 'google.dataflow.v1beta3.MetricsV1Beta3';

    /**
     * The default address of the service.
     */
    const SERVICE_ADDRESS = 'dataflow.googleapis.com';

    /**
     * The default port of the service.
     */
    const DEFAULT_SERVICE_PORT = 443;

    /**
     * The name of the code generator, to be included in the agent header.
     */
    const CODEGEN_NAME = 'gapic';

    /**
     * The default scopes required by the service.
     */
    public static $serviceScopes = [
        'https://www.googleapis.com/auth/cloud-platform',
        'https://www.googleapis.com/auth/compute',
        'https://www.googleapis.com/auth/compute.readonly',
        'https://www.googleapis.com/auth/userinfo.email',
    ];

    private static function getClientDefaults()
    {
        return [
            'serviceName' => self::SERVICE_NAME,
            'apiEndpoint' =>
                self::SERVICE_ADDRESS . ':' . self::DEFAULT_SERVICE_PORT,
            'clientConfig' =>
                __DIR__ . '/../resources/metrics_v1_beta3_client_config.json',
            'descriptorsConfigPath' =>
                __DIR__ .
                '/../resources/metrics_v1_beta3_descriptor_config.php',
            'gcpApiConfigPath' =>
                __DIR__ . '/../resources/metrics_v1_beta3_grpc_config.json',
            'credentialsConfig' => [
                'defaultScopes' => self::$serviceScopes,
            ],
            'transportConfig' => [
                'rest' => [
                    'restClientConfigPath' =>
                        __DIR__ .
                        '/../resources/metrics_v1_beta3_rest_client_config.php',
                ],
            ],
        ];
    }

    /**
     * Constructor.
     *
     * @param array $options {
     *     Optional. Options for configuring the service API wrapper.
     *
     *     @type string $serviceAddress
     *           **Deprecated**. This option will be removed in a future major release. Please
     *           utilize the `$apiEndpoint` option instead.
     *     @type string $apiEndpoint
     *           The address of the API remote host. May optionally include the port, formatted
     *           as "<uri>:<port>". Default 'dataflow.googleapis.com:443'.
     *     @type string|array|FetchAuthTokenInterface|CredentialsWrapper $credentials
     *           The credentials to be used by the client to authorize API calls. This option
     *           accepts either a path to a credentials file, or a decoded credentials file as a
     *           PHP array.
     *           *Advanced usage*: In addition, this option can also accept a pre-constructed
     *           {@see \Google\Auth\FetchAuthTokenInterface} object or
     *           {@see \Google\ApiCore\CredentialsWrapper} object. Note that when one of these
     *           objects are provided, any settings in $credentialsConfig will be ignored.
     *     @type array $credentialsConfig
     *           Options used to configure credentials, including auth token caching, for the
     *           client. For a full list of supporting configuration options, see
     *           {@see \Google\ApiCore\CredentialsWrapper::build()} .
     *     @type bool $disableRetries
     *           Determines whether or not retries defined by the client configuration should be
     *           disabled. Defaults to `false`.
     *     @type string|array $clientConfig
     *           Client method configuration, including retry settings. This option can be either
     *           a path to a JSON file, or a PHP array containing the decoded JSON data. By
     *           default this settings points to the default client config file, which is
     *           provided in the resources folder.
     *     @type string|TransportInterface $transport
     *           The transport used for executing network requests. May be either the string
     *           `rest` or `grpc`. Defaults to `grpc` if gRPC support is detected on the system.
     *           *Advanced usage*: Additionally, it is possible to pass in an already
     *           instantiated {@see \Google\ApiCore\Transport\TransportInterface} object. Note
     *           that when this object is provided, any settings in $transportConfig, and any
     *           $serviceAddress setting, will be ignored.
     *     @type array $transportConfig
     *           Configuration options that will be used to construct the transport. Options for
     *           each supported transport type should be passed in a key for that transport. For
     *           example:
     *           $transportConfig = [
     *               'grpc' => [...],
     *               'rest' => [...],
     *           ];
     *           See the {@see \Google\ApiCore\Transport\GrpcTransport::build()} and
     *           {@see \Google\ApiCore\Transport\RestTransport::build()} methods for the
     *           supported options.
     *     @type callable $clientCertSource
     *           A callable which returns the client cert as a string. This can be used to
     *           provide a certificate and private key to the transport layer for mTLS.
     * }
     *
     * @throws ValidationException
     *
     * @experimental
     */
    public function __construct(array $options = [])
    {
        $clientOptions = $this->buildClientOptions($options);
        $this->setClientOptions($clientOptions);
    }

    /**
     * Request detailed information about the execution status of the job.
     *
     * EXPERIMENTAL.  This API is subject to change or removal without notice.
     *
     * Sample code:
     * ```
     * $metricsV1Beta3Client = new MetricsV1Beta3Client();
     * try {
     *     // Iterate over pages of elements
     *     $pagedResponse = $metricsV1Beta3Client->getJobExecutionDetails();
     *     foreach ($pagedResponse->iteratePages() as $page) {
     *         foreach ($page as $element) {
     *             // doSomethingWith($element);
     *         }
     *     }
     *     // Alternatively:
     *     // Iterate through all elements
     *     $pagedResponse = $metricsV1Beta3Client->getJobExecutionDetails();
     *     foreach ($pagedResponse->iterateAllElements() as $element) {
     *         // doSomethingWith($element);
     *     }
     * } finally {
     *     $metricsV1Beta3Client->close();
     * }
     * ```
     *
     * @param array $optionalArgs {
     *     Optional.
     *
     *     @type string $projectId
     *           A project id.
     *     @type string $jobId
     *           The job to get execution details for.
     *     @type string $location
     *           The [regional endpoint]
     *           (https://cloud.google.com/dataflow/docs/concepts/regional-endpoints) that
     *           contains the job specified by job_id.
     *     @type int $pageSize
     *           The maximum number of resources contained in the underlying API
     *           response. The API may return fewer values in a page, even if
     *           there are additional values to be retrieved.
     *     @type string $pageToken
     *           A page token is used to specify a page of values to be returned.
     *           If no page token is specified (the default), the first page
     *           of values will be returned. Any page token used here must have
     *           been generated by a previous call to the API.
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a
     *           {@see Google\ApiCore\RetrySettings} object, or an associative array of retry
     *           settings parameters. See the documentation on
     *           {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\ApiCore\PagedListResponse
     *
     * @throws ApiException if the remote call fails
     *
     * @experimental
     */
    public function getJobExecutionDetails(array $optionalArgs = [])
    {
        $request = new GetJobExecutionDetailsRequest();
        $requestParamHeaders = [];
        if (isset($optionalArgs['projectId'])) {
            $request->setProjectId($optionalArgs['projectId']);
            $requestParamHeaders['project_id'] = $optionalArgs['projectId'];
        }

        if (isset($optionalArgs['jobId'])) {
            $request->setJobId($optionalArgs['jobId']);
            $requestParamHeaders['job_id'] = $optionalArgs['jobId'];
        }

        if (isset($optionalArgs['location'])) {
            $request->setLocation($optionalArgs['location']);
            $requestParamHeaders['location'] = $optionalArgs['location'];
        }

        if (isset($optionalArgs['pageSize'])) {
            $request->setPageSize($optionalArgs['pageSize']);
        }

        if (isset($optionalArgs['pageToken'])) {
            $request->setPageToken($optionalArgs['pageToken']);
        }

        $requestParams = new RequestParamsHeaderDescriptor(
            $requestParamHeaders
        );
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();
        return $this->getPagedListResponse(
            'GetJobExecutionDetails',
            $optionalArgs,
            JobExecutionDetails::class,
            $request
        );
    }

    /**
     * Request the job status.
     *
     * To request the status of a job, we recommend using
     * `projects.locations.jobs.getMetrics` with a [regional endpoint]
     * (https://cloud.google.com/dataflow/docs/concepts/regional-endpoints). Using
     * `projects.jobs.getMetrics` is not recommended, as you can only request the
     * status of jobs that are running in `us-central1`.
     *
     * Sample code:
     * ```
     * $metricsV1Beta3Client = new MetricsV1Beta3Client();
     * try {
     *     $response = $metricsV1Beta3Client->getJobMetrics();
     * } finally {
     *     $metricsV1Beta3Client->close();
     * }
     * ```
     *
     * @param array $optionalArgs {
     *     Optional.
     *
     *     @type string $projectId
     *           A project id.
     *     @type string $jobId
     *           The job to get metrics for.
     *     @type Timestamp $startTime
     *           Return only metric data that has changed since this time.
     *           Default is to return all information about all metrics for the job.
     *     @type string $location
     *           The [regional endpoint]
     *           (https://cloud.google.com/dataflow/docs/concepts/regional-endpoints) that
     *           contains the job specified by job_id.
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a
     *           {@see Google\ApiCore\RetrySettings} object, or an associative array of retry
     *           settings parameters. See the documentation on
     *           {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Dataflow\V1beta3\JobMetrics
     *
     * @throws ApiException if the remote call fails
     *
     * @experimental
     */
    public function getJobMetrics(array $optionalArgs = [])
    {
        $request = new GetJobMetricsRequest();
        $requestParamHeaders = [];
        if (isset($optionalArgs['projectId'])) {
            $request->setProjectId($optionalArgs['projectId']);
            $requestParamHeaders['project_id'] = $optionalArgs['projectId'];
        }

        if (isset($optionalArgs['jobId'])) {
            $request->setJobId($optionalArgs['jobId']);
            $requestParamHeaders['job_id'] = $optionalArgs['jobId'];
        }

        if (isset($optionalArgs['startTime'])) {
            $request->setStartTime($optionalArgs['startTime']);
        }

        if (isset($optionalArgs['location'])) {
            $request->setLocation($optionalArgs['location']);
            $requestParamHeaders['location'] = $optionalArgs['location'];
        }

        $requestParams = new RequestParamsHeaderDescriptor(
            $requestParamHeaders
        );
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();
        return $this->startCall(
            'GetJobMetrics',
            JobMetrics::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Request detailed information about the execution status of a stage of the
     * job.
     *
     * EXPERIMENTAL.  This API is subject to change or removal without notice.
     *
     * Sample code:
     * ```
     * $metricsV1Beta3Client = new MetricsV1Beta3Client();
     * try {
     *     // Iterate over pages of elements
     *     $pagedResponse = $metricsV1Beta3Client->getStageExecutionDetails();
     *     foreach ($pagedResponse->iteratePages() as $page) {
     *         foreach ($page as $element) {
     *             // doSomethingWith($element);
     *         }
     *     }
     *     // Alternatively:
     *     // Iterate through all elements
     *     $pagedResponse = $metricsV1Beta3Client->getStageExecutionDetails();
     *     foreach ($pagedResponse->iterateAllElements() as $element) {
     *         // doSomethingWith($element);
     *     }
     * } finally {
     *     $metricsV1Beta3Client->close();
     * }
     * ```
     *
     * @param array $optionalArgs {
     *     Optional.
     *
     *     @type string $projectId
     *           A project id.
     *     @type string $jobId
     *           The job to get execution details for.
     *     @type string $location
     *           The [regional endpoint]
     *           (https://cloud.google.com/dataflow/docs/concepts/regional-endpoints) that
     *           contains the job specified by job_id.
     *     @type string $stageId
     *           The stage for which to fetch information.
     *     @type int $pageSize
     *           The maximum number of resources contained in the underlying API
     *           response. The API may return fewer values in a page, even if
     *           there are additional values to be retrieved.
     *     @type string $pageToken
     *           A page token is used to specify a page of values to be returned.
     *           If no page token is specified (the default), the first page
     *           of values will be returned. Any page token used here must have
     *           been generated by a previous call to the API.
     *     @type Timestamp $startTime
     *           Lower time bound of work items to include, by start time.
     *     @type Timestamp $endTime
     *           Upper time bound of work items to include, by start time.
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a
     *           {@see Google\ApiCore\RetrySettings} object, or an associative array of retry
     *           settings parameters. See the documentation on
     *           {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\ApiCore\PagedListResponse
     *
     * @throws ApiException if the remote call fails
     *
     * @experimental
     */
    public function getStageExecutionDetails(array $optionalArgs = [])
    {
        $request = new GetStageExecutionDetailsRequest();
        $requestParamHeaders = [];
        if (isset($optionalArgs['projectId'])) {
            $request->setProjectId($optionalArgs['projectId']);
            $requestParamHeaders['project_id'] = $optionalArgs['projectId'];
        }

        if (isset($optionalArgs['jobId'])) {
            $request->setJobId($optionalArgs['jobId']);
            $requestParamHeaders['job_id'] = $optionalArgs['jobId'];
        }

        if (isset($optionalArgs['location'])) {
            $request->setLocation($optionalArgs['location']);
            $requestParamHeaders['location'] = $optionalArgs['location'];
        }

        if (isset($optionalArgs['stageId'])) {
            $request->setStageId($optionalArgs['stageId']);
            $requestParamHeaders['stage_id'] = $optionalArgs['stageId'];
        }

        if (isset($optionalArgs['pageSize'])) {
            $request->setPageSize($optionalArgs['pageSize']);
        }

        if (isset($optionalArgs['pageToken'])) {
            $request->setPageToken($optionalArgs['pageToken']);
        }

        if (isset($optionalArgs['startTime'])) {
            $request->setStartTime($optionalArgs['startTime']);
        }

        if (isset($optionalArgs['endTime'])) {
            $request->setEndTime($optionalArgs['endTime']);
        }

        $requestParams = new RequestParamsHeaderDescriptor(
            $requestParamHeaders
        );
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();
        return $this->getPagedListResponse(
            'GetStageExecutionDetails',
            $optionalArgs,
            StageExecutionDetails::class,
            $request
        );
    }
}