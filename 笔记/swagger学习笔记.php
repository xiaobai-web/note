<?php 

/**
 * @SWG\Swagger(
 *    swagger="2.0",                 // 固定,api版本
 *     schemes={"https"},            // 协议
 *     host="tcmzapi.emao.com",      // 域名
 *     basePath="/",                 // 根路径
 *     @SWG\Info(
 *         version="1.0.0",                    // API 文档版本
 *         title="淘车猫中转库 Api 文档",       // API 文档标题
 *         description="淘车猫中转库 Api 文档"  // API 文档描述
 *     )
 * )
 */

/**
@SWG\Get(                                    // 请求方法名
 *     path="/persons",                      // 请求路径
 *     summary="获取一些人",                  // 接口简介
 *     description="返回包含所有人的列表。",   // 接口描述
 *     tags={"Persons"},                     // 分类标签
 *     operationId="searchUsers",            // 处理的函数名
 *     @SWG\Response(                        // 响应信息
 *         response=200,                     // 响应http码
 *         description="一个用户列表",        // 响应信息描述
 *         @SWG\Schema(                      // 描述具体返回内容
 *             type="array",                 // 返回类型
 *             @SWG\Items(                   // 信息
 *                  required={"username"}        // 绝对会提供的信息
 *                  @SWG\Property(               // 
         *              property="firstName",    // 字段名
         *              type="string",           // 字段类型
         *              description="firstName"  // 字段描述
         *          ),
         *          @SWG\Property(
         *              property="lastName",
         *              type="string",
         *              description="lastName"
         *          )
 *             )
 *         ),
 *     ),
        @SWG\Parameter(                      // 请求参数
            name="pageSize",                 // 参数名
            in="query",                      // 所在位置
            description="",                  // 参数描述
            required="true"                  // 参数是否必须
            type="integer"                   // 参数类型
            default="20"                     // 默认值 
            allowEmptyValue="true"           // 带空值的参数
        ),
 * )
 */



// 定义常量
/**
 * @SWG\Definition(
 *     definition="Person",
 *     type="object",
 *     required={"username"},
 *     @SWG\Property(
 *         property="firstName",
 *         type="string"
 *     ),
 *     @SWG\Property(
 *         property="lastName",
 *         type="string"
 *     ),
 *     @SWG\Property(
 *         property="username",
 *         type="string"
 *     )
 * )
 */

// 使用常量
/**
 * @SWG\Definition(
 *     definition="Persons",
 *     type="array",
 *     @SWG\Items(ref="#/definitions/Person")
 * )
 */


// 定义响应头
/**
 * @SWG\Response(
 *     response="Standard500ErrorResponse",
 *     description="An unexpected error occured.",
 *     @SWG\schema(ref="#/definitions/Error")
 * )
 */

// 使用响应头
/*
 * @SWG\Response(
 *     response="500",
 *     ref="#/responses/Standard500ErrorResponse"
 * )
*/

// 文件参数
/**
 * @SWG\Post(
 *     path="/images",
 *     summary="Uploads an image",
 *     consumes={"multipart/form-data"},
 *     @SWG\Parameter(
 *         name="image",
 *         in="formData",
 *         type="file"
 *     )
 *     @SWG\Response(
 *         response="200",
 *         description="Image's ID",
 *         @SWG\Schema(
 *             @SWG\Property(
 *                  property="imageId",
 *                  type="string"
 *             )
 *         )
 *     )
 * )
 */

// 






/**
@SWG\Get(                              
 *     path="/persons",             
 *     summary="获取一些人",              
 *     description="返回包含所有人的列表。",  
 *     tags={"Persons"},                  
 *     operationId="searchUsers",        
 *     @SWG\Response(                   
 *         response=200,             
 *         description="一个用户列表",     
 *         @SWG\Schema(                   
 *             type="array",             
 *             @SWG\Items(                
 *                  required={"firstName"}      
 *                  @SWG\Property(             
         *              property="firstName",    
         *              type="string",          
         *              description="firstName"  
         *          ),
         *          @SWG\Property(
         *              property="lastName",
         *              type="string",
         *              description="lastName"
         *          )
 *             )
 *         ),
 *     ),
        @SWG\Parameter(                  
            name="pageSize",            
            in="query",                  
            description="",             
            required="true"                
            type="integer"           
            default="20"               
            allowEmptyValue="true"      
        ),
 * )
 */
// 扶翼 招财 火灵 木魅 招财
// 花花 鬼吞 阿里 化境 小白
name - string
参数名. 通过路径传参(in 取值 "path")时有注意事项,没用到,懒得看了...

in - string
参数从何处来. 必填. 取值仅限: "query", "header", "path", "formData", "body"

description - string
参数描述. 最好别太长

type - string
参数类型. 取值仅限: "string", "number", "integer", "boolean", "array", "file"

required - boolean
参数是否必须. 通过路径传参(in 取值 "path")时必须为 true.

default - *
默认值. 在你打算把参数通过 path 传递时规矩挺多,我没用到.用到的同学自己看文档吧.

// 二维数组
/**
 * @SWG\Definition(
 *     definition="IntegralGoodsIndexListTmp",
 *     @SWG\Property(
 *         property="data",
 *         type="array",
 *         @SWG\Items(
 *              allOf={
 *                  @SWG\Schema(ref="#/definitions/goodsTmp"),
 *                  @SWG\Schema(
 *                      @SWG\Property(
 *                          property="money",
 *                          type="integer",
 *                          description="兑换所需金额"
 *                      ),
 *                      @SWG\Property(
 *                          property="integral",
 *                          type="integer",
 *                          description="兑换所需积分"
 *                      ),
 *                      @SWG\Property(
 *                          property="some_day_total_exchange",
 *                          type="integer",
 *                          description="30天兑换量"
 *                      )
 *                  )
 *              }
 *          ),
 *     )
 * )
 */

// 蚌精            火灵                      招财           招财         心眼/日女/木魅/招财/散件一速
// 化境            阿里                      鬼吞           小白         花花/芋圆/化境/九次良/炎魔
// 速攻攻          生功爆                    速攻暴         速生生        
// 生命两件套      暴击两件套(暴击差15)       暴击两件套     生命两件套(招财套生命速度不足)    
// 缺火灵/招财