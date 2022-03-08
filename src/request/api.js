import request from './axios';

// 1.获取图片地址
export const getImgUrl = (query) => {
    return request({
        url: '/class/upload_img.php',
        method: 'post',
        data: query
    })
}