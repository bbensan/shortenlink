import { Injectable } from "@nestjs/common";

@Injectable()
export class IndexService {
  index() {
    return {
      message: 'Cannot GET /',
      error: 'Not Found',
      statusCode: 404,
    };
  }

  healthCheck() {
    return {
      status: 'ok',
      message: 'Server is running',
      timestamp: new Date(),
    };
  }
}