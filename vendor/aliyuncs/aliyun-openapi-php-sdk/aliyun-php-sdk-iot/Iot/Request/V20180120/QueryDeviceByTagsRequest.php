<?php
/*
 * Licensed to the Apache Software Foundation (ASF) under one
 * or more contributor license agreements.  See the NOTICE file
 * distributed with this work for additional information
 * regarding copyright ownership.  The ASF licenses this file
 * to you under the Apache License, Version 2.0 (the
 * "License"); you may not use this file except in compliance
 * with the License.  You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing,
 * software distributed under the License is distributed on an
 * "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY
 * KIND, either express or implied.  See the License for the
 * specific language governing permissions and limitations
 * under the License.
 */
namespace Iot\Request\V20180120;

class QueryDeviceByTagsRequest extends \RpcAcsRequest
{
	function  __construct()
	{
		parent::__construct("Iot", "2018-01-20", "QueryDeviceByTags");
		$this->setMethod("POST");
	}

	private  $pageSize;

	private  $currentPage;

	private  $Tags;

	public function getPageSize() {
		return $this->pageSize;
	}

	public function setPageSize($pageSize) {
		$this->pageSize = $pageSize;
		$this->queryParameters["PageSize"]=$pageSize;
	}

	public function getCurrentPage() {
		return $this->currentPage;
	}

	public function setCurrentPage($currentPage) {
		$this->currentPage = $currentPage;
		$this->queryParameters["CurrentPage"]=$currentPage;
	}

	public function getTags() {
		return $this->Tags;
	}

	public function setTags($Tags) {
		$this->Tags = $Tags;
		for ($i = 0; $i < count($Tags); $i ++) {	
			$this->queryParameters['Tag.' . ($i + 1) . '.TagValue'] = $Tags[$i]['TagValue'];
			$this->queryParameters['Tag.' . ($i + 1) . '.TagKey'] = $Tags[$i]['TagKey'];

		}
	}
	
}